<?php

namespace App\Http\Services\Dashboards;

use App\Models\Establishment;
use App\Models\Filters;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\DB;
use Symfony\Component\HttpFoundation\Response;

class SuperAdminDashboardService
{
    /*    public function createAdminEstablishment($request){
           $temporaryPassword = Str::random(10);

           // Создать администратора заведения с временным паролем и установить время создания пароля
           $adminEstablishment = AdminEstablishment::create([
               'email' => $request->email,
               'password' => Hash::make($temporaryPassword),
               'password_created_at' => now(),
           ]);

           $adminEstablishment->registeredEstablishments()->attach($request->establishment_id);

          $token = Password::broker()->createToken($adminEstablishment);

           $adminEstablishment->sendPasswordResetNotification($token, $temporaryPassword);

        return response()->json(['message' => 'Admin created successfully', 'status' => 200]);
    }
    */
    public function store($request)
    {
        DB::beginTransaction();
        try {
            $establishmentData = $request->only(['name', 'workload_parameter', 'address', 'address_latitude', 'address_longitude']);
            $establishment = Establishment::create($establishmentData);

            if ($request->subscription_type == 'prime') {
                $registeredEstablishmentData = $request->only([
                    'likes', 'description', 'contact_email',
                    'contact_vk', 'contact_inst', 'contact_tg',
                ]);
                $establishment->registeredEstablishments()->create($registeredEstablishmentData);
            }

            $filterData = [];
            foreach ($request->filters ?: [] as $filter) {
                $filterData[$filter['id']] = true;
            }
            $filterModel = Filters::updateOrCreate(['establishment_id' => $establishment->id], $filterData); // создаем или обновляем запись в filter_establishments

            DB::commit();
            return response()->json([
                'message' => 'Establishment and filters added successfully.',
                'establishment_id' => $establishment->id,
            ], Response::HTTP_CREATED);

        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json([
                'message' => 'An error occurred while creating the establishment and filters.',
                'error' => $e->getMessage(),
            ], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    public function show($id): JsonResponse
    {
        $establishment = Establishment::with(['filters', 'registeredEstablishments'])->find($id);

        if (!$establishment) {
            return response()->json([
                'message' => 'Establishment not found.',
            ], 404);
        }

        $filtersArray = $establishment->filters ? $establishment->filters->toArray() : [];

        $filteredFilters = array_filter($filtersArray, function ($value, $key) {
            return !in_array($key, ['id', 'created_at', 'updated_at', 'establishment_id']) && $value != 0;
        }, ARRAY_FILTER_USE_BOTH);

        return response()->json([
            'establishment' => $establishment,
            'filters' => $filteredFilters,
            'registered_info' => $establishment->registeredEstablishments,
        ]);
    }
    public function search($request){
        $searchTerm = $request->input('name', '');

        $establishments = Establishment::searchByName($searchTerm)->get();

        if ($establishments->isEmpty()) {
            return response()->json(['message' => 'Заведения не найдены'], 404);
        }

        $establishments = $establishments->map(function ($establishment) {
            return [
                'id' => $establishment->id,
                'name' => $establishment->name,
                'registered' => $establishment->registeredEstablishments()->exists(),
            ];
        });

        return response()->json($establishments);
    }
}
