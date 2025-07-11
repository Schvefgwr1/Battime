<?php

namespace App\Http\Controllers\API\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginAdminEstablishmentRequest;
use App\Http\Requests\SmsValidationRequest;
use App\Http\Services\Authorization\SuperAdminAuthorizationService;
use Illuminate\Http\JsonResponse;

class AuthSuperAdminController extends Controller
{
    public function __construct(SuperAdminAuthorizationService $adminService)
    {
        $this->adminService = $adminService;
    }

    /**
     * @OA\Post(
     *     path="/superadmin/login",
     *     summary="Login Super Admin (first step)",
     *     tags={"Auth Super Admins"},
     *     @OA\RequestBody(
     *         required=true,
     *         description="Get verification code in mail",
     *         @OA\JsonContent(
     *             required={"email", "password"},
     *             @OA\Property(
     *                 property="email",
     *                 type="string",
     *                 description="Email of the super admin"
     *             ),
     *             @OA\Property(
     *                 property="password",
     *                 type="string",
     *                 description="The password provided to the admin personally, cannot be created"
     *             ),
     *         )
     *     ),
     *     @OA\Response(
     *         response=201,
     *         description="successful operation 201, code sent to mail",
     *         @OA\JsonContent(
     *             @OA\Property(
     *                 property="message",
     *                 type="string",
     *                 example="Код двухфакторной аутентификации отправлен."
     *             ),
     *         )
     *     ),
     *     @OA\Response(
     *         response=401,
     *         description="invalid pass or mail",
     *         @OA\JsonContent(
     *             @OA\Property(
     *                 property="message",
     *                 type="string",
     *                 example="Неправильный логин или пароль"
     *             )
     *         )
     *     )
     * )
     */

    public function loginSuperAdmin(LoginAdminEstablishmentRequest $request): JsonResponse
    {
        return $this->adminService->login($request);
    }
    /**
     * @OA\Post(
     *     path="/superadmin/verify-2fa",
     *     summary="Login Super Admin (second step)",
     *     tags={"Auth Super Admins"},
     *     @OA\RequestBody(
     *         required=true,
     *         description="Checking the code from email",
     *         @OA\JsonContent(
     *             required={"email", "password"},
     *             @OA\Property(
     *                 property="code",
     *                 type="string",
     *                 description="The code sent from the mail is 6 characters long"
     *             ),
     *         )
     *     ),
     *     @OA\Response(
     *         response=201,
     *         description="successful operation 200, code is correct",
     *         @OA\JsonContent(
     *             @OA\Property(
     *                 property="token",
     *                 type="string",
     *                 example="1| sevapilifront"
     *             ),
     *         )
     *     ),
     *     @OA\Response(
     *         response=401,
     *         description="Time is out or code incorrect",
     *         @OA\JsonContent(
     *             @OA\Property(
     *                 property="message",
     *                 type="string",
     *                 example="Неверный код двухфакторной аутентификации, или код истек."
     *             ),
     *         )
     *     ),
     * )
     */
    public function verify2FA(SmsValidationRequest $request): JsonResponse
    {
        return $this->adminService->verify2FA($request);
    }
}
