<?php

namespace App\Http\Controllers\API\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\PhoneNumberValidationRequest;
use App\Http\Requests\SmsValidationRequest;
use App\Http\Services\Authorization\UserAuthorizationService;
use Illuminate\Http\JsonResponse;


class AuthUserController extends Controller
{
    private $authorizationService;

    public function __construct(UserAuthorizationService $authorizationService)
    {
        $this->authorizationService = $authorizationService;
    }
    /**
     *
     * @OA\Post(
     *     path="/userauth",
     *     summary="Registration of user (first step)",
     *     tags={"Users"},
     *     @OA\RequestBody(
     *         required=true,
     *         description="Get user code in sms",
     *         @OA\JsonContent(
     *             required={"Users_NumberPhone"},
     *             @OA\Property(
     *                 property="Users_NumberPhone",
     *                 type="integer",
     *                 example=79991234567
     *             )
     *         )
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="successful operation",
     *         @OA\JsonContent(
     *             @OA\Property(
     *                 property="success",
     *                 type="bool",
     *                 example=true
     *             ),
     *             @OA\Property(
     *                 property="message",
     *                 type="string",
     *                 example="Sms send user"
     *             )
     *         )
     *     ),
     *     @OA\Response(
     *         response=201,
     *         description="successful operation 200",
     *         @OA\JsonContent(
     *             @OA\Property(
     *                 property="success",
     *                 type="bool",
     *                 example=true
     *             ),
     *             @OA\Property(
     *                 property="message",
     *                 type="string",
     *                 example="Sms send user"
     *             ),
     *             @OA\Property(
     *                 property="sms",
     *                 type="string",
     *                 example="176352"
     *             )
     *         )
     *     ),
     *     @OA\Response(
     *         response=422,
     *         description="invalid number phone",
     *         @OA\JsonContent(
     *             @OA\Property(
     *                 property="success",
     *                 type="bool",
     *                 example=false
     *             ),
     *             @OA\Property(
     *                 property="message",
     *                 type="string",
     *                 example="Invalid number phone"
     *             )
     *         )
     *     )
     * )
     **/

    public function authorizeForUserViaNumber(PhoneNumberValidationRequest $request): JsonResponse
    {
        return $this->authorizationService->authorizeForUserViaNumber($request);
    }

    /**
     *
     * @OA\Post(
     *     path="/usercheck",
     *     summary="Registration of user (second step)",
     *     tags={"Users"},
     *     @OA\RequestBody(
     *         required=true,
     *         description="User set verification code",
     *         @OA\JsonContent(
     *             required={"Sms_User_Sent"},
     *             @OA\Property(
     *                 property="Sms_User_Sent",
     *                 type="integer",
     *                 example=152975
     *             )
     *         )
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="successful operation 200",
     *         @OA\JsonContent(
     *             @OA\Property(
     *                 property="success",
     *                 type="bool",
     *                 example=true
     *             ),
     *             @OA\Property(
     *                 property="token",
     *                 type="string",
     *                 example="gh4GJJ1HG!gj"
     *             ),
     *             @OA\Property(
     *                 property="message",
     *                 type="string",
     *                 example="User logged successfully"
     *             )
     *         )
     *     ),
     *     @OA\Response(
     *         response=422,
     *         description="Invalid code",
     *         @OA\JsonContent(
     *             @OA\Property(
     *                 property="message",
     *                 type="string",
     *                 example="Invalid credentials"
     *             )
     *         )
     *     ),
     *     @OA\Response(
     *         response=408,
     *         description="Time out",
     *         @OA\JsonContent(
     *             @OA\Property(
     *                 property="success",
     *                 type="bool",
     *                 example=false
     *             ),
     *             @OA\Property(
     *                 property="message",
     *                 type="string",
     *                 example="Sms time out"
     *             )
     *         )
     *     ),
     *     @OA\Response(
     *         response=500,
     *         description="Code not find",
     *         @OA\JsonContent(
     *             @OA\Property(
     *                 property="success",
     *                 type="bool",
     *                 example=false
     *             ),
     *             @OA\Property(
     *                 property="message",
     *                 type="string",
     *                 example="Sms not find"
     *             )
     *         )
     *     )
     * )
     **/

    public function checksms(SmsValidationRequest $request): JsonResponse
    {
        return $this->authorizationService->validationSms($request);
    }

}
