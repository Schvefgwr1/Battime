<?php

namespace App\Http\Services\Authorization;

use App\Models\User;
use Exception;
use Illuminate\Support\Facades\Hash;

include_once "smsc_api.php";
class UserAuthorizationService
{
    private function create_student_token($user)
    {
        $token = $user->createToken(str($user['Users_PhoneNumber']))->plainTextToken;
        return $token;
    }
    public function authorizeForUserViaNumber($request)
    {
        $input = $request->all();
        try {
            $pattern = '![^0-9]+!';
            $input = preg_replace($pattern, '', $input);
            if (preg_match('/^[7]{1}[9]{1}[0-9]{9}/', $input['Users_NumberPhone'])){
                if (!User::where('Users_NumberPhone', $input['Users_NumberPhone'])->exists()) {
                    $email_user = $input['Users_NumberPhone'] . '@battime.ru';
                    $User_Visitor = User::create(array_merge($input, ['email' => $email_user, 'password' => Hash::make($input['Users_NumberPhone'])]));
                    $success['Users_NumberPhone'] = $User_Visitor->Users_NumberPhone;
                    $User_Visitor->save();
                    $Sms_User_Sent = rand(100000, 999999);
                    $text_sms = str($Sms_User_Sent);
                    $phone_number = str($input['Users_NumberPhone']);
                    list($sms_id, $sms_cnt) = send_sms($phone_number, $text_sms);
                    $User_Visitor = User::where('Users_NumberPhone', '=', $input['Users_NumberPhone'])->update(array('Sms_User_Sent' => $Sms_User_Sent, 'Sms_created' => now()));

                    return response()->json([
                        'success' => true,
                        'message' => 'Sms send send',
                        'sms' => $text_sms,
                    ]);
                } else {
                    $Sms_User_Sent = rand(100000, 999999);
                    $User_Visitor = User::where('Users_NumberPhone', '=', $input['Users_NumberPhone'])->update(array('Sms_User_Sent' => $Sms_User_Sent, 'Sms_created' => now()));
                    $text_sms = str($Sms_User_Sent);
                    $phone_number = str($input['Users_NumberPhone']);
                    list($sms_id, $sms_cnt) = send_sms($phone_number, $text_sms);
                    return response()->json([
                        'success' => true,
                        'message' => 'Sms send User',
                        'sms' => $text_sms,
                    ], 200);
                }
            }
            else{
                return response()->json([
                    'success' => false,
                    'message' => "Invalid number phone"
                ], 422);
            }

        }

        catch (Exception $e){
            return response()->json([
                'success' => false,
                'message' => $e->getMessage(),
            ], 200);
        }
    }
    public function validationSms($request)
    {
        $Date_now = now();
        $input = $request->all();
        if (User::where('Sms_User_Sent', $input['Sms_User_Sent'])->first()) {
            $User_Date = User::where('Sms_User_Sent', $input['Sms_User_Sent'])->first();
            $diff = $Date_now->diffInMinutes($User_Date['Sms_created']);
            $Data_difference = 10;
            if ($diff < $Data_difference) {
                $email_user = $User_Date['email'];
                $password_phone = str($User_Date['Users_NumberPhone']);
                $peremennaya = auth()->attempt(array_merge($request->all(), ['email' => $email_user, 'password' => $password_phone]));
                if (!$peremennaya) {
                    return response()->json([
                        'error_message' => 'Invalid credentials',
                    ], 422);
                }
                $user = auth()->user();
                $token = $this->create_student_token($user);
                User::where('Sms_User_Sent', $input['Sms_User_Sent'])->update(array('remember_token' => $token));
                return response()->json([
                    'success' => true,
                    'token' => $token,
                    'message' => 'User logged successfully',
                ], 200);
            } else {
                return response()->json([
                    'success' => false,
                    'message' => 'Sms time out',
                ], 408);
            }
        } else {
            return response()->json([
                'success' => false,
                'message' => 'Sms not find',
            ], 403);
        }
    }
}
