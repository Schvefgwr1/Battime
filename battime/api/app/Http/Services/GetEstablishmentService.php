<?php

namespace App\Http\Services;

use App\Models\Establishment;
use App\Models\Menu_links;
use App\Models\MenuLinks;
use App\Models\Registered_establishments;
use App\Models\RegisteredEstablishments;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class GetEstablishmentService
{
    public function getPoints()
    {
        $Users = Establishment::get();
        $DataMassive = [];

        foreach ($Users as $user) {
            $Data = [
                'id' => $user->id,
                'emoji' => $user->link_to_emoji,
                'coordinates' => [
                    'latitude' => $user->address_latitude,
                    'longitude' => $user->address_longitude
                ],
                'name' => $user->name
            ];
            $DataMassive[] = $Data;
        }

        return response()->json(['success' => true, 'data' => $DataMassive]);
    }

    private function GetNotRegisteredEstablishment(Request $request): JsonResponse
    {
        $input = $request->all();
        $Establishment = Establishment::where('id', $input['establishment_id'])->first();

        $filters = array_map(function ($filter) {
            return $filter['mame_filter'];
        }, $Establishment->Filters->toArray());

        return response()->json([
            'id' => $Establishment->id,
            'name' => $Establishment->name,
            'likes' => $Establishment->likes,
            'workload_parameter' => $Establishment->workload_parameter,
            'establishment_likes' => null,
            'establishment_info' => [
                'description' => null,
                'establishment_menu' => null,
                'establishment_contacts' => [
                    'establishment_email' => null,
                    'establishment_inst' => null,
                    'establishment_vk' => null,
                    'establishment_telegram' => null,
                ]
            ],
            'establishment_address' => $Establishment->address,
            'coordinates' => array(
                'latitude' => $Establishment->address_latitude,
                'longitude' => $Establishment->address_longitude
            ),
            'filters' => $filters
        ]);
    }

    public function getRegisteredEstablishment(Request $request): JsonResponse
    {
        $input = $request->all();
        $PrimaryEstablishment = Establishment::where('id', $input['establishment_id'])->first();

        if (!$PrimaryEstablishment) {
            return response()->json(null, 204);
        }

        $RegisteredEstablishment = RegisteredEstablishments::where('establishment_id', $input['establishment_id'])->first();
        if ($RegisteredEstablishment) {

            $MenuPhotosJsons = MenuLinks::select('link_to_menu_photo')->where('establishment_id', $RegisteredEstablishment->id)->orderBy('list_number', 'asc')->get();
            $MenuPhotos = array();
            foreach ($MenuPhotosJsons as $photo) {
                $MenuPhotos[] = $photo->link_to_menu_photo;
            }

            $filters = array_map(function ($filter) {
                return $filter['mame_filter'];
            }, $PrimaryEstablishment->Filters->toArray());

            return response()->json([
                'id' => $PrimaryEstablishment->id,
                'name' => $PrimaryEstablishment->name,
                'likes' => $PrimaryEstablishment->likes,
                'workload_parameter' => $PrimaryEstablishment->workload_parameter,
                'establishment_likes' => $RegisteredEstablishment->link_to_avatar,
                'establishment_info' => [
                    'description' => $RegisteredEstablishment->description,
                    'establishment_menu' => $MenuPhotos,
                    'establishment_contacts' => [
                        'establishment_email' => $RegisteredEstablishment->contact_email,
                        'establishment_inst' => $RegisteredEstablishment->contact_inst,
                        'establishment_vk' => $RegisteredEstablishment->contact_vk,
                        'establishment_telegram' => $RegisteredEstablishment->contact_tg,
                    ]
                ],
                'establishment_addresses' => $PrimaryEstablishment->address,
                'coordinates' => array(
                    'latitude' => $PrimaryEstablishment->address_latitude,
                    'longitude' => $PrimaryEstablishment->address_longitude
                ),
                'filters' => $filters
            ]);

        } else {

            return $this->GetNotRegisteredEstablishment($request);
        }
    }
    public function getAllEstablishments(){
        $establishments = Establishment::all()->map(function ($establishment) {
            return [
                'id' => $establishment->id,
                'name' => $establishment->name,
                'address' => $establishment->address,
                'emoji' => $establishment->link_to_emoji,
                'registered' => $establishment->registeredEstablishments()->exists(),
            ];
        });

        return response()->json($establishments);
    }

    public function deleteEstablishment($id)
    {
        $establishment = Establishment::find($id);

        if (!$establishment) {
            return response()->json(['message' => 'Заведение не найдено'], 404);
        }
        $establishment->likes()->detach();

        $establishment->delete();

        return response()->json(['message' => 'Удалено успешно'], 200);

    }
}
