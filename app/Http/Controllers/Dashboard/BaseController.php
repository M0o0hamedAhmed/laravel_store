<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class BaseController extends Controller
{
    public function sendResponse($result='', $message = 'success', $code = 200): JsonResponse
    {

        $response = [
            'data' => $result,
            'status' => true,
            'message' => $message
        ];
        return Response()->json($response, $code);
    }

    public function sendError($error='', $errorMessages =[], $code = 422): JsonResponse
    {

        $response = [
            'status' => false,
            'message' => $error
        ];

        if(!empty($errorMessages)){
            $response['data'] = $errorMessages;
        }

        return Response()->json($response, $code);
    }
}
