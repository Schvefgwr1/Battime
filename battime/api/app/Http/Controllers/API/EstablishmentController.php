<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\EstablishmentIdValidationRequest;
use App\Http\Services\GetEstablishmentService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class EstablishmentController extends Controller
{
    //123123123
    protected GetEstablishmentService $getEstablismentService;

    /**
     * @param GetEstablishmentService $getEstablismentService
     */
    public function __construct(GetEstablishmentService $getEstablismentService)
    {
        $this->getEstablismentService = $getEstablismentService;
    }
    //123123
    /**
     * Update the specified user.
     *
     * @return JsonResponse
     * @throws ValidationException
     */

    /**
     * @OA\Get(
     *     path="/establishment_emoji_point",
     *     summary="Get list of points in maps",
     *     tags={"Establishments"},
     *     @OA\Response(
     *         response=200,
     *         description="successful operation",
     *         @OA\JsonContent(
     *         @OA\Property(
     *             type="array",
     *             description="Array of establishment`s points",
     *             @OA\Items(
     *                 type="object",
     *                 @OA\Property(
     *                     property="success",
     *                     description="Connection success",
     *                     type="boolean",
     *                     example="true"
     *                 ),
     *                 @OA\Property(
     *                     property="data",
     *                     type="object",
     *                     @OA\Property(
     *                         property="id",
     *                         description="ID of establishment",
     *                         type="integer",
     *                         example="5"
     *                     ),
     *                     @OA\Property(
     *                         property="emoji",
     *                         description="Link to emoji of establishment",
     *                         type="string",
     *                         example="/public/photo122.png"
     *                     ),
     *                     @OA\Property(
     *                         property="coordinates",
     *                         description="Establishment`s coordinates",
     *                         type="object",
     *                         @OA\Property(
     *                             property="latitude",
     *                             type="number",
     *                             example="3.086464"
     *                         ),
     *                         @OA\Property(
     *                             property="longitude",
     *                             type="number",
     *                             example="3.030891"
     *                         )
     *                     ),
     *                     @OA\Property(
     *                         property="name",
     *                         description="Name of establishment",
     *                         type="string",
     *                         example="Martinez"
     *                     ),
     *                 )
     *             )
     *             )
     *         )
     *     )
     *
     * )
     */

    public function GetPoints(): JsonResponse
    {
        return $this->getEstablismentService->getPoints();
    }

    /**
     * Update the specified user.
     *
     * @param Request $request
     * @return JsonResponse
     * @throws ValidationException
     */

    /**
     * @OA\Get(
     *     path="/establishment_card",
     *     summary="Get description of establishment",
     *     tags={"Establishments"},
     *     @OA\RequestBody(
     *         required=true,
     *         description="Get establishment information",
     *         @OA\JsonContent(
     *             required={"establishment_id"},
     *             @OA\Property(
     *                 property="establishment_id",
     *                 type="integer",
     *                 example=3
     *             )
     *         )
     *     ),
     *     @OA\Response(
     *         response=500,
     *         description="internal server error",
     *     ),
     *     @OA\Response(
     *         response=204,
     *         description="null",
     *     ),
     *     @OA\Response (
     *         response=200,
     *         description="successful operation",
     *         @OA\JsonContent(
     *             @OA\Property(
     *                 property="name",
     *                 type="string",
     *                 description="Establishment name",
     *                 example="Martinez"
     *             ),
     *             @OA\Property(
     *                 property="likes",
     *                 type="integer",
     *                 description="Likes of establishment",
     *                 example="565"
     *             ),
     *             @OA\Property(
     *                 property="workload_parameter",
     *                 type="integer",
     *                 description="Establishment`s occupancy percentage",
     *                 example="65"
     *             ),
     *             @OA\Property(
     *                 property="establishment_likes",
     *                 type="string",
     *                 description="Establishment`s link to logo",
     *                 example="../public/logo432.png"
     *             ),
     *             @OA\Property(
     *                 property="establishment_info",
     *                 type="object",
     *                 description="Information about establishment",
     *                 @OA\Property(
     *                      property="description",
     *                      type="string",
     *                      description="Text information",
     *                      example="You can parking your car near establishment..."
     *                 ),
     *                 @OA\Property(
     *                      property="establishment_menu",
     *                      type="array",
     *                      description="Links to menu photos",
     *                      @OA\Items(
     *                          type="string"
     *                      ),
     *                      example="[`link1`, `link2`, `link3`]"
     *                  ),
     *                 @OA\Property(
     *                     property="establishment_contacts",
     *                     type="object",
     *                     description="Contacts of establishment",
     *                     @OA\Property(
     *                         property="establishment_email",
     *                         type="string",
     *                         format="email",
     *                         example="qwerty@guchi.drill"
     *                     ),
     *                     @OA\Property(
     *                         property="establishment_inst",
     *                         type="string",
     *                         example="qwerty"
     *                     ),
     *                     @OA\Property(
     *                         property="establishment_vk",
     *                         type="string",
     *                         example="qwerty"
     *                     ),
     *                     @OA\Property(
     *                         property="establishment_telegram",
     *                         type="string",
     *                         example="qwerty"
     *                     )
     *                 )
     *             ),
     *             @OA\Property(
     *                 property="establishment_address",
     *                 type="string",
     *                 description="Establishment`s address",
     *                 example="улица Пушкина дом 32"
     *             ),
     *             @OA\Property(
     *                 property="coordinates",
     *                 description="Establishment`s coordinates",
     *                 type="object",
     *                 @OA\Property(
     *                     property="latitude",
     *                     type="number",
     *                     example="3.086464"
     *                 ),
     *                 @OA\Property(
     *                     property="longitude",
     *                     type="number",
     *                     example="3.030891"
     *                 )
     *             ),
     *         )
     *     )
     * )
     */
    //123123123123
    public function GetRegisteredEstablishment(EstablishmentIdValidationRequest $request): JsonResponse
    {
        return $this->getEstablismentService->getRegisteredEstablishment($request);
    }

    /**
     * @OA\Get(
     *     path="/superadmin/get_establishments",
     *     summary="Получить список всех учреждений для SuperAdmin",
     *     tags={"SuperAdminsDashboard"},
     *     security={{"sanctum": {}}},
     *     @OA\Response(
     *         response=200,
     *         description="Успешное получение списка заведений",
     *         @OA\JsonContent(
     *             type="array",
     *             @OA\Items(
     *                 type="object",
     *                 required={"id", "name", "registered"},
     *                 @OA\Property(
     *                     property="id",
     *                     type="integer",
     *                     format="int64",
     *                     example=1
     *                 ),
     *                 @OA\Property(
     *                     property="name",
     *                     type="string",
     *                     example="РУССКИЙ ПАБ - крафтовый гастробар"
     *                 ),
     *                 @OA\Property(
     *                     property="registered",
     *                     type="boolean",
     *                     example=false
     *                 )
     *             )
     *         )
     *     ),
     *     @OA\Response(
     *         response=403,
     *         description="Доступ запрещен для не суперадминов"
     *     ),
     *     @OA\Response(
     *         response=500,
     *         description="Внутренняя ошибка сервера"
     *     )
     * )
     */
    public function getAllEstablishment()
    {
        return $this->getEstablismentService->getAllEstablishments();
    }

    public function delete($id)
    {
        return $this->getEstablismentService->deleteEstablishment($id);
    }
}
