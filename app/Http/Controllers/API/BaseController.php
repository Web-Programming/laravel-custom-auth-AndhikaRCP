<?php

namespace App\Http\Controllers;

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
        return response()->json($response, 200);
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
    public function show(no $no)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(no $no)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, no $no)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(no $no)
    {
        //

   }
}