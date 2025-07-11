<?php

namespace App\Http\Services\Authorization;

use Illuminate\Auth\Events\PasswordReset;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Password;

class AdminEstadlishmentAuthorizationService
{
    public function login($request): JsonResponse
    {
        $credentials = $request->all();
        if (Auth::guard('admin_establishments')->attempt($credentials)) {
            $admin = Auth::guard('admin_establishments')->user();
            $token = $admin->createToken('auth_token')->plainTextToken;
            return response()->json(['token' => $token], 200);
        }

        return response()->json(['message' => 'Email or password incorrect'], 403);
    }

    public function forgotPassword(Request $request): JsonResponse
    {
        $request->validate([
            'email' => 'required|email',
        ]);

        $status = Password::broker('admin_establishments')->sendResetLink(
            $request->only('email')
        );

        if ($status === Password::RESET_LINK_SENT) {
            return response()->json([
                'success' => true,
                'email' => $request->email,
                'message' => trans($status)
            ], 200);
        } elseif ($status === Password::RESET_THROTTLED) {
            return response()->json([
                'success' => false,
                'email' => $request->email,
                'message' => trans($status)
            ], 429);
        } else {
            return response()->json([
                'success' => false,
                'email' => $request->email,
                'message' => trans($status)
            ], 500);
        }
    }
    public function resetPassword(Request $request): JsonResponse
    {
        $data = $request->validate([
            'email' => 'required|email',
            'password' => 'required|string|min:8',
            'token' => 'required',
        ]);

        $status = Password::broker('admin_establishments')->reset(
            $data,
            function ($user, $password) {
                $user->forceFill([
                    'password' => Hash::make($password)
                ])->save();

                event(new PasswordReset($user));
            }
        );

        return match ($status) {
            Password::PASSWORD_RESET => response()->json(['success' => true], 201),
            Password::INVALID_TOKEN => response()->json(['success' => false, 'message' => 'invalid token'], 403),
            Password::INVALID_USER => response()->json(['success' => false, 'message' => 'invalid user email'], 404),
            default => response()->json(['success' => false, 'message' => 'an error occurred'], 500),
        };
    }

}
