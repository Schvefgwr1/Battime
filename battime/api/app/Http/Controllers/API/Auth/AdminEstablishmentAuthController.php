<?php

namespace App\Http\Controllers\API\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginAdminEstablishmentRequest;
use App\Http\Requests\ResetPasswordEstablismentAdminRequest;
use App\Http\Requests\SendEmailToResetPasswordAdminEstablishment;
use App\Http\Services\Authorization\AdminEstadlishmentAuthorizationService;
use Illuminate\Http\JsonResponse;

class AdminEstablishmentAuthController extends Controller
{
    //123
    public function __construct(AdminEstadlishmentAuthorizationService $adminEstadlishmentAuthorizationService)
    {
        $this->adminEstadlishmentAuthorizationService = $adminEstadlishmentAuthorizationService;
    }
    /**
     * @OA\Post(
     *   path="/api/login/login_admin_establishmen",
     *   summary="Login admin establishment",
     *   tags={"Auth Admin Establishment"},
     *   @OA\Parameter(
     *     name="email",
     *     in="query",
     *     required=true,
     *     @OA\Schema(type="string")
     *   ),
     *   @OA\Parameter(
     *     name="password",
     *     in="query",
     *     required=true,
     *     @OA\Schema(type="string")
     *   ),
     *   @OA\Response(
     *     response=200,
     *     description="Success",
     *     @OA\JsonContent(@OA\Property(property="token", type="string"))
     *   ),
     *   @OA\Response(
     *     response=403,
     *     description="Forbidden",
     *     @OA\JsonContent(@OA\Property(property="message", type="string"))
     *   )
     * )
     */
    public function loginAdminEstab(LoginAdminEstablishmentRequest $request): JsonResponse
    {
        return $this->adminEstadlishmentAuthorizationService->login($request);
    }
    /**
     * @OA\Post(
     *   path="/api/login/forgot_password",
     *   summary="Sending an e-mail with a link to reset the password",
     *   tags={"Auth Admin Establishment"},
     *   @OA\Parameter(
     *     name="email",
     *     in="query",
     *     required=true,
     *     @OA\Schema(type="string")
     *   ),
     *   @OA\Response(
     *     response=200,
     *     description="Success",
     *     @OA\JsonContent(
     *       @OA\Property(property="success", type="boolean", example=true),
     *       @OA\Property(property="email", type="string", example="user@example.com"),
     *       @OA\Property(property="message", type="string", example="We have emailed your password reset link!")
     *     )
     *   ),
     *     @OA\Response(
     *     response=500,
     *     description="Forbidden",
     *     @OA\JsonContent(
     *       @OA\Property(property="success", type="boolean", example=false),
     *       @OA\Property(property="email", type="string", example="user@example.com"),
     *       @OA\Property(property="message", type="string", example="We can't find a user with that email address.")
     *     )
     *   )
     * )
     */
    public function forgotPassword(SendEmailToResetPasswordAdminEstablishment $request)
    {
        return $this->adminEstadlishmentAuthorizationService->forgotPassword($request);
    }
    /**
     * @OA\Post(
     *   path="/api/login/reset_password",
     *   summary="Creating a new password",
     *   tags={"Auth Admin Establishment"},
     *   @OA\RequestBody(
     *     required=true,
     *     @OA\JsonContent(
     *       required={"email", "password", "token"},
     *       @OA\Property(property="email", type="string", format="email", example="user@example.com"),
     *       @OA\Property(property="password", type="string", format="password", example="password"),
     *       @OA\Property(property="token", type="string", example="1a2b3c4d5e")
     *     )
     *   ),
     *   @OA\Response(
     *     response=201,
     *     description="Password reset successfully",
     *     @OA\JsonContent(
     *       @OA\Property(property="success", type="boolean", example=true)
     *     )
     *   ),
     *   @OA\Response(
     *     response=403,
     *     description="Invalid token provided",
     *     @OA\JsonContent(
     *       @OA\Property(property="success", type="boolean", example=false),
     *       @OA\Property(property="message", type="string", example="invalid token")
     *     )
     *   ),
     *   @OA\Response(
     *     response=404,
     *     description="Invalid user email provided",
     *     @OA\JsonContent(
     *       @OA\Property(property="success", type="boolean", example=false),
     *       @OA\Property(property="message", type="string", example="invalid user email")
     *     )
     *   ),
     *   @OA\Response(
     *     response=500,
     *     description="Generic error",
     *     @OA\JsonContent(
     *       @OA\Property(property="success", type="boolean", example=false),
     *       @OA\Property(property="message", type="string", example="an error occurred")
     *     )
     *   )
     * )
     */
    protected function confirmNewPassword(ResetPasswordEstablismentAdminRequest $request){
        return $this->adminEstadlishmentAuthorizationService->resetPassword($request);
    }
}
