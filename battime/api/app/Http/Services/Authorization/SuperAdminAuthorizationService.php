<?php

namespace App\Http\Services\Authorization;

use App\Models\SuperAdmin;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Hash;

class SuperAdminAuthorizationService
{
    public function login($request): JsonResponse
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        $superAdmin = SuperAdmin::where('email', $request->email)->first();

        if (!$superAdmin || !Hash::check($request->password, $superAdmin->password)) {
            return response()->json(['message' => 'Неправильный логин или пароль'], 401);
        }

        $superAdmin->two_factor_code = rand(100000, 999999);
        $superAdmin->two_factor_expires_at = now()->addMinutes(10);
        $superAdmin->save();

        $superAdmin->send2FANotification($superAdmin->two_factor_code);

        return response()->json(['message' => 'Код двухфакторной аутентификации отправлен.'], );
    }
    public function verify2FA($request): JsonResponse
    {
        $request->validate([
            'Sms_User_Sent' => 'required',
        ]);

        $superAdmin = SuperAdmin::where('two_factor_code', $request->Sms_User_Sent)
            ->where('two_factor_expires_at', '>', now())
            ->first();

        if (!$superAdmin) {
            return response()->json(['message' => 'Неверный код двухфакторной аутентификации, или код истек.'], 401);
        }

        $superAdmin->two_factor_code = null;
        $superAdmin->two_factor_expires_at = null;
        $superAdmin->save();

        $token = $superAdmin->createToken('auth_token')->plainTextToken;

        return response()->json(['access_token' => $token]);
    }
}
