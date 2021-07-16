<?php

namespace App\Traits;

use Session;
use App\Models\Account;
use Illuminate\Http\Request;

trait Utils
{
    public $PAGE_SIZE_DEFAULT = 5;

    public function sendResponse($status = 1, $data = [])
    {
        return [
            'status'    => $status,
            'data'      => $data
        ];
    }

    public function sendJsonResponse($message = "Success", $data = [], $status_code = 200)
    {
        $message = is_null($message) || empty($message) ? "Success" : $message;
        return response()->json([
            'message'   => $message,
            'data'      => $data
        ], $status_code);
    }

    public function getTokenFromAuthHeader($request)
    {
        $auth_header = $request->header('Authorization');
        $auth = explode("Bearer ", $auth_header);
        if (count($auth) !== 2) {
            return false;
        }
        return $auth[1];
    }

    public function generateAccessToken($email)
    {
        return base64_encode(base64_encode($email . 'AETOSDATA.COM'));
    }

    // public function generateResetPasswordToken($email, $role)
    // {
    //     $ingredients = $role . SiteUtils::generateRandomString(5, true, true, true) . $email . Carbon::now()->timestamp;
    //     return base64_encode(base64_encode($ingredients));
    // }

}
