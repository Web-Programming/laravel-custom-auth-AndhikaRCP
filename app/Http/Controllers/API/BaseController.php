<?php

namespace App\Http\Controllers\API;

use App\Models\no;
use Illuminate\Http\Request;

use App\Http\Controllers\Controller as Controller;

class BaseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function sendResponse($result, $message)
    {
        $response = [
          'success' => true,
          'data' => $result,
          'message' => $message
        ];

        return response()->json($response, 200);
    }

       public function sendError($error, $errorMessages = [], $code = 404)
    {
        $response = [
          'success' => false,
          'message' => $error
        ];

        if (!empty($errorMessages)) {
            $response['data'] = $errorMessages;
        }
        return response()->json($response, $code);
    }

    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */

}