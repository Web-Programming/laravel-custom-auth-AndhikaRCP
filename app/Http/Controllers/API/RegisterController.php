<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\API\BaseController;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;


class RegisterController extends BaseController
{
    /**
     * Display a listing of the resource.
     */

     public function register(  Request $request)
     {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required',
            'c_password' => 'required|same:password',
            'role' => 'required'
        ]);


        if($validator->fails()) {
            return $this->sendError("Validation Error", $validator->errors());
        }
        $input= $request->all();
        $input['password'] = bcrypt($input['password']);
        $user = User::create($input);
        $success['token'] =$user->createToken('myApp')->plainTextToken;
        $success['name'] = $user->name;

        return $this->sendResponse($success,"User Registration Successfully");
     }

     public function login(Request $request) {
        if(Auth::attempt(['email' =>$request->email, 'password' =>$request->password])) {
            $user= Auth::User();
            $success['token'] = $user->createToken('MyApp')->plainTextToken;
            $success['name'] = $user->name;

            return $this->sendResponse($success, "User Login Successfuly.");
        }else {
            return $this->sendError("Unathorised.", ['error' => "Unathorised"]);
        }
     }
}
