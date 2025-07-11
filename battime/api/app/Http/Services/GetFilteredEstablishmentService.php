<?php

namespace App\Http\Services;

use App\Models\Establishment;
use App\Models\Filters;
use App\Models\FiltersCategory;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Symfony\Component\Console\Output\ConsoleOutput;

class GetFilteredEstablishmentService
{
    public function GetFiltered(Request $request): JsonResponse
    {
        $latitude = $request->input('latitude');
        $longitude = $request->input('longitude');
        $filters = $request->input('filters');

        $establishments = DB::table('establishments')
            ->select('name', 'address_latitude', 'address_longitude', 'id')
            ->whereRaw("(6371 * acos( cos( radians($latitude) )
                      * cos( radians( address_latitude ) )
                      * cos( radians( address_longitude )
                      - radians($longitude)
                      ) + sin( radians($latitude) )
                      * sin( radians( address_latitude ) ) )
                      ) < 2")->get();

        $output = new ConsoleOutput();

        $filtered_establishments = [];
        foreach($establishments as $est) {
            $establishment = Establishment::find($est->id);
            $f_ids = array_map(function ($obj) {
                return $obj['id_filt'];
            }, $establishment->Filters->toArray());
            $flag = true;
            foreach($filters as $filter) {
                $output->writeln("Filters: ".json_encode(in_array($filter, $f_ids)));
                if(!in_array($filter, $f_ids)) {
                    $flag = false;
                }
            }
            if($flag) {
                $filtered_establishments[] = $establishment;
            }
            $output->writeln("Est: ".$flag);
        }

        $response = array_map(function($e) {
            return [
                'name' => $e->name,
                'id' => $e->id,
                'address_latitude' => $e->address_latitude,
                'address_longitude' =>$e->address_longitude,
                'link_to_emoji' => $e->link_to_emoji
            ];
        }, $filtered_establishments);

        return response()->json($response);
    }

    public function getFilters(): JsonResponse
    {
        $Filters = FiltersCategory::get();
        $categories = [];
        foreach ($Filters as $filter) {
            $category = $filter->category_filter;

            if (!isset($categories[$category])) {
                $categories[$category] = [];
            }
            $categories[$category][] = [
                'id' => $filter->id_filt,
                'label' => $filter->mame_filter,
            ];
        }
        $formattedCategories = [];
        foreach ($categories as $categoryName => $filters) {
            $formattedCategories[] = [
                $categoryName => $filters,
            ];
        }

        return response()->json([
            'category' => $formattedCategories,
        ], 200);
    }
}
