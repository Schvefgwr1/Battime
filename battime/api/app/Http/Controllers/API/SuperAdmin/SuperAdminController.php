<?php

namespace App\Http\Controllers\API\SuperAdmin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CreateEstablishmentRequest;
use App\Http\Requests\NameOfEstablishmentRequest;
use App\Http\Services\Dashboards\SuperAdminDashboardService;
use App\Models\Establishment;
use Illuminate\Http\JsonResponse;

class SuperAdminController extends Controller
{
    private SuperAdminDashboardService $getFilteredEstablishmentService;

    public function __construct(SuperAdminDashboardService $superAdminDashboardService)
    {
        $this->getFilteredEstablishmentService = $superAdminDashboardService;
    }
    /*
    public function createEatabAdmin(EmailAndEsadIdRequest $request){
        return $this->getFilteredEstablishmentService->createAdminEstablishment($request);
    }*/
    /**
     * @OA\Post(
     *      path="/superadmin/create_establishments",
     *      summary="Создание нового заведение через Админский дашбоард",
     *      tags={"SuperAdminsDashboard"},
     *      security={{"sanctum": {}}},
     *      @OA\RequestBody(
     *          required=true,
     *          @OA\JsonContent(
     *              required={"name", "workload_parameter", "address", "latitude", "longitude", "subscription_type", "filters"},
     *              @OA\Property(property="name", type="string"),
     *              @OA\Property(
     *                  property="menu",
     *                  type="array",
     *                  description="Массив изображений форматов JPEG и PNG",
     *                  @OA\Items(
     *                      type="string",
     *                      format="binary",
     *                  )
     *              ),
     *              @OA\Property(property="workload_parameter", type="integer"),
     *              @OA\Property(property="address", type="string"),
     *              @OA\Property(property="latitude", type="number", format="double"),
     *              @OA\Property(property="longitude", type="number", format="double"),
     *              @OA\Property(property="subscription_type", type="string"),
     *              @OA\Property(property="likes", type="integer"),
     *              @OA\Property(property="description", type="string"),
     *              @OA\Property(property="contact_email", type="string", format="email"),
     *              @OA\Property(property="contact_vk", type="string", format="uri"),
     *              @OA\Property(property="contact_inst", type="string", format="uri"),
     *              @OA\Property(property="contact_tg", type="string"),
     *              @OA\Property(
     *                  property="filters",
     *                  type="array",
     *                  @OA\Items(
     *                      type="object",
     *                      @OA\Property(property="id", type="string"),
     *                      @OA\Property(property="label", type="string")
     *                  )
     *              )
     *          )
     *      ),
     *      @OA\Response(
     *          response=201,
     *          description="Заведение и фильтры успешно добавлены",
     *          @OA\JsonContent(
     *              @OA\Property(property="message", type="string"),
     *              @OA\Property(property="establishment_id", type="integer")
     *          )
     *      ),
     *      @OA\Response(
     *          response=403,
     *          description="Неавторизован"
     *      ),
     *      @OA\Response(
     *          response=500,
     *          description="Ошибка при создании заведения и фильтров",
     *          @OA\JsonContent(
     *              @OA\Property(property="message", type="string"),
     *              @OA\Property(property="error", type="string")
     *          )
     *      )
     * )
     */
    public function createEstablishments(CreateEstablishmentRequest $request)
    {
        return $this->getFilteredEstablishmentService->store($request);

    }
    /**
     * @OA\Get(
     *     path="/superadmin/establishments/{id}",
     *     summary="Получить детальную информацию о заведении по ID",
     *     tags={"SuperAdminsDashboard"},
     *     security={{"sanctum": {}}},
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         description="Уникальный идентификатор заведения",
     *         required=true,
     *         @OA\Schema(
     *             type="integer",
     *             format="int64"
     *         )
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Успешное получение информации о заведении",
     *         @OA\JsonContent(
     *             type="object",
     *             @OA\Property(
     *                 property="establishment",
     *                 type="object",
     *                 @OA\Property(
     *                     property="id",
     *                     type="integer",
     *                     format="int64",
     *                     example=27
     *                 ),
     *                 @OA\Property(
     *                     property="name",
     *                     type="string",
     *                     example="СИСЬКИ"
     *                 ),
     *                 @OA\Property(
     *                     property="workload_parameter",
     *                     type="integer",
     *                     example=20
     *                 ),
     *                 @OA\Property(
     *                     property="link_to_emoji",
     *                     type="string",
     *                     nullable=true,
     *                     example=null
     *                 ),
     *                 @OA\Property(
     *                     property="address_latitude",
     *                     type="number",
     *                     format="float",
     *                     example=0
     *                 ),
     *                 @OA\Property(
     *                     property="address_longitude",
     *                     type="number",
     *                     format="float",
     *                     example=0
     *                 ),
     *                 @OA\Property(
     *                     property="address",
     *                     type="string",
     *                     example="г. Москва, ул. сисек, д. 69"
     *                 )
     *             ),
     *             @OA\Property(
     *                 property="filters",
     *                 type="object",
     *                 @OA\Property(
     *                     property="ROCK",
     *                     type="integer",
     *                     example=1
     *                 ),
     *             ),
     *             @OA\Property(
     *                 property="registered_info",
     *                 type="array",
     *                 @OA\Items(
     *                     type="object",
     *                     @OA\Property(
     *                         property="likes",
     *                         type="integer",
     *                         example=1
     *                     ),
     *                     @OA\Property(
     *                         property="description",
     *                         type="string",
     *                         example="Гастрономическое удовольствие с лучщими сиськами"
     *                     ),
     *                 )
     *             )
     *         )
     *     ),
     *     @OA\Response(
     *         response=404,
     *         description="Заведение не найдено"
     *     ),
     *     @OA\Response(
     *         response=403,
     *         description="Доступ запрещен"
     *     ),
     *     @OA\Response(
     *         response=500,
     *         description="Внутренняя ошибка сервера"
     *     )
     * )
     */

    public function show($id)
    {
        return $this->getFilteredEstablishmentService->show($id);
    }
    /**
     * @OA\Get(
     *     path="/superadmin/search_establishments",
     *     summary="Поиск заведений по имени",
     *     tags={"SuperAdminsDashboard"},
     *     security={{"sanctum": {}}},
     *     @OA\Parameter(
     *         name="name",
     *         in="query",
     *         description="Имя для поиска заведений",
     *         required=false,
     *         @OA\Schema(
     *             type="string"
     *         )
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Список найденных заведений",
     *         @OA\JsonContent(
     *             type="array",
     *             @OA\Items(
     *                 type="object",
     *                 @OA\Property(
     *                     property="id",
     *                     type="integer",
     *                     format="int64",
     *                     example=1
     *                 ),
     *                 @OA\Property(
     *                     property="name",
     *                     type="string",
     *                     example="Кофейня 'Одинокий Кабанчик'"
     *                 ),
     *                 @OA\Property(
     *                     property="registered",
     *                     type="string",
     *                     description="Тип заведения: зарегистрированное или нет",
     *                     example="true"
     *                 )
     *             )
     *         )
     *     ),
     *     @OA\Response(
     *         response=404,
     *         description="Заведения не найдены",
     *         @OA\JsonContent(
     *             type="array",
     *             @OA\Items(
     *                 type="object",
     *                 @OA\Property(
     *                     property="message",
     *                     type="string",
     *                     example="Заведения не найдены"
     *                 )
     *              )
     *          )
     *     ),
     *     @OA\Response(
     *         response=403,
     *         description="Доступ запрещен"
     *     ),
     *     @OA\Response(
     *         response=500,
     *         description="Внутренняя ошибка сервера"
     *     )
     * )
     */
    public function searchEstablishmetnsByName(NameOfEstablishmentRequest $request){
        return$this->getFilteredEstablishmentService->search($request);
    }

}
