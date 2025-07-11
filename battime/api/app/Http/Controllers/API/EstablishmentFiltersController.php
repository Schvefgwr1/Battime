<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\FilteredEstablishmentRequest;
use App\Http\Services\GetFilteredEstablishmentService;
use App\Models\Establishment;
use App\Models\Filters;
use App\Services\GetFilterdEstablishmentService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class EstablishmentFiltersController extends Controller
{
    public $getFilteredEstablishmentService;

    /**
     * @param $getFilteredEstablishmentService
     */
    public function __construct(GetFilteredEstablishmentService $getFilteredEstablishmentService)
    {
        $this->getFilteredEstablishmentService = $getFilteredEstablishmentService;
    }

    /**
     * @OA\Get(
     *     path="/get_filters",
     *     summary="Get list of filters",
     *     tags={"Filters"},
     *     @OA\Response(
     *         response=200,
     *         description="successful operation",
     *         @OA\JsonContent(
     *             type="object",
     *             @OA\Property(
     *                 property="category",
     *                 type="object",
     *                 @OA\Property(
     *                     property="Music",
     *                     type="array",
     *                     @OA\Items(
     *                         type="object",
     *                         @OA\Property(property="id", type="string", example="ROCK"),
     *                         @OA\Property(property="label", type="string", example="Rock")
     *                     ),
     *                     description="List of music genres"
     *                 ),
     *                 example={
     *                     "Music": {
     *                         {"id": "ROCK", "label": "Rock"},
     *                         {"id": "POP1", "label": "Pop"},
     *                         {"id": "HIPH", "label": "Hip-hop"},
     *                         {"id": "KPOP", "label": "K-pop"},
     *                         {"id": "TECH", "label": "Techno"},
     *                         {"id": "RAP1", "label": "Rap"},
     *                         {"id": "JAZZ", "label": "Jazz"},
     *                         {"id": "CLAS", "label": "Classical"},
     *                         {"id": "MIXE", "label": "Mixed Music"}
     *                     }
     *                 }
     *             )
     *         )
     *     ),
     *     @OA\Response(
     *         response=500,
     *         description="incorrect bearer token",
     *         @OA\JsonContent(
     *             @OA\Property(
     *                 type="string",
     *                 property="message",
     *                 example="Unauthenticated."
     *             )
     *         )
     *     )
     * )
     */

    public function GetFilters(): JsonResponse
    {
        return $this->getFilteredEstablishmentService->getFilters();
    }

    public function GetFilteredWithRadius(FilteredEstablishmentRequest $request): JsonResponse
    {
        return $this->getFilteredEstablishmentService->GetFiltered($request);
    }

}
