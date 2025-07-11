<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\Storage;

class UserProfileAuth extends Controller
{
    /**
     * Update the specified user.
     * @param Request $request
     * @return JsonResponse
     * @throws ValidationException
     */

    /**
     * @OA\Get(
     *     path="/get_profile",
     *     summary="Get profile of user",
     *     tags={"Users"},
     *     @OA\Response(
     *         response=200,
     *         description="successful operation",
     *         @OA\JsonContent(
     *         @OA\Property(
     *             type="integer",
     *             property="User_id",
     *             description="ID of User",
     *             example="228"
     *         ),
     *         @OA\Property(
     *             type="string",
     *             property="profile_image",
     *             description="Photo of user`s profile",
     *             example="/c:/as/as/as/228.png"
     *         ),
     *         @OA\Property(
     *             type="string",
     *             property="user_firstname",
     *             description="Name of user",
     *             example="Boris"
     *         ),
     *         @OA\Property(
     *             type="string",
     *             property="user_lastname",
     *             description="Last name of user",
     *             example="Ivanov"
     *         ),
     *         @OA\Property(
     *             type="string",
     *             property="user_mail",
     *             description="Email of user",
     *             example="example@example.com"
     *         )
     *         )
     *     ),
     *     @OA\Response(
     *         response=500,
     *         description="incorrect bearer token",
     *         @OA\JsonContent(
     *         @OA\Property(
     *             type="string",
     *             property="message",
     *             example="Unauthenticated."
     *         )
     *         )
     *     )
     * )
     *
     **/

    public function GetProfile(Request $request): JsonResponse
    {
        $token = substr($request->header('Authorization'), 7);
        $user = User::where('remember_token', $token)->first();

        if ($user) {
            return response()->json([
                'User_id' => $user->id,
                'profile_image' => $user->profile_image,
                'user_firstname' => $user->name,
                'user_lastname' => $user->user_lastname,
                'user_mail' => $user->email,
                'phone_number' => $user->Users_NumberPhone
            ], );
        } else {
            return response()->json(['message' => 'This bearer token does not exist'], 204);
        }
    }


    /**
     * Update the specified user.
     * @param Request $request
     * @return JsonResponse
     * @throws ValidationException
     */

    /**
     * @OA\Post(
     *     path="/update_profile",
     *     summary="Update profile of user",
     *     tags={"Users"},
     *     @OA\RequestBody(
     *         required=true,
     *         @OA\JsonContent(
     *             @OA\Property (
     *                 property="remember_token",
     *                 type="string",
     *                 example="jkn54nn76kj456kj7",
     *                 description="Sunctum token"
     *             ),
     *             @OA\Property (
     *                 property="Users_NumberPhone",
     *                 type="string",
     *                 example="79558003535",
     *                 description="Number of Phone"
     *             ),
     *             @OA\Property(
     *                 type="string",
     *                 property="name",
     *                 description="Name of user",
     *                 example="Boris"
     *             ),
     *             @OA\Property(
     *                 type="string",
     *                 property="user_lastname",
     *                 description="Last name of user",
     *                 example="Ivanov"
     *             ),
     *             @OA\Property(
     *                 type="string",
     *                 property="user_mail",
     *                 description="Email of user",
     *                 example="example@example.com"
     *             )
     *         )
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="successful operation",
     *         @OA\JsonContent(
     *         @OA\Property(
     *             type="string",
     *             property="message",
     *             example="The data has been successfully updated"
     *         )
     *         )
     *     ),
     *     @OA\Response(
     *         response=500,
     *         description="incorrect bearer token",
     *         @OA\JsonContent(
     *         @OA\Property(
     *             type="string",
     *             property="message",
     *             example="Unauthenticated."
     *         )
     *         )
     *     ),
     *     @OA\Response(
     *         response=204,
     *         description="incorrect bearer token",
     *         @OA\JsonContent(
     *         @OA\Property(
     *             type="string",
     *             property="message",
     *             example="This bearer token does not exist."
     *         )
     *         )
     *     )
     * )
     *
     **/
//123
    public function UpdateProfile(Request $request): JsonResponse
    {

        $validation = $request->validate([
            'Users_NumberPhone' => 'required|digits:11|starts_with:7',
            'name' => 'required|string',
            'user_lastname' => 'required|string',
            'user_mail' => 'required|string',
            'photo_avatar' => 'image'
        ]);

        $input = $request->all();
        $value = $request->header('Authorization');
        $value = substr_replace($value, null, 0, 7);
        $User = User::where('remember_token', $value)->first();
        if ($User) {
            if (isset($request->photo_avatar)) {

                $image_local_path = Storage::disk('public')->put("avatars", $request->file('photo_avatar'));
                rename("storage/$image_local_path", "storage/avatars/$User->id.png");
                $image_local_path = "avatars/$User->id.png";
                $image_path = asset("storage/$image_local_path");

            } else {
                $image_path = asset("storage/avatars/default_avatar.png");
            }
            $User = User::where('remember_token', $value)->update(array(
                'Users_NumberPhone'=> $input['Users_NumberPhone'],
                'name'=>$input['name'],
                'user_lastname' => $input['user_lastname'],
                'email' => $input['user_mail'],
                'profile_image' => $image_path
            ));
            return response()->json([
                'message' => 'The data has been successfully updated'
            ], status: 200);
        } else {
            return response()->json([
                'message' => 'This bearer token does not exist'
            ], 204);
        }
    }

    /**
     * Create the specified user.
     * @param Request $request
     * @return JsonResponse
     * @throws ValidationException
     */
    public function Delete_Profile(Request $request):JsonResponse {
        $validation = $request->validate([
            'remember_token' => 'required',
        ]);
        $input = $request->all();
        if (User::where('remember_token', $input['remember_token'])->first()) {
            $User = User::where('remember_token', $input['remember_token'])->first()->delete();
            if(!User::where('remember_token', $input['remember_token'])->first()) {
                return response()->json([
                    'massage' => 'The data has not been delete',
                ], 500);
            }
            return response()->json([
                'massage' => 'The data has been successfully delete',
            ], status: 200);
        } else {
            return response()->json([
                'massage' => 'This bearer token does not exist'
            ], 204);
        }
    }

}
