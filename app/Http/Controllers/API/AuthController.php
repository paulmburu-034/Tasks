<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Requests\AuthRegisterRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class AuthController extends BaseController
{
    public function index()
    {
        $users = User::all();
        return $this->sendResponse($users,'Display all user data' );
    }

    public function register(AuthRegisterRequest $request)
    {
        $validator = $request->validated();

        $input = $request->validated();
        $input['password'] = bcrypt($input['password']);
        $user = User::create($input);
        $success['token'] = $user->createToken('MyAuthApp')->plainTextToken;
        $success['username'] = $user->name;
        return $this->sendResponse($success, 'User registered successfully!');
    }

    public function login(Request $request)
    {
        if(Auth::attempt(['name' => $request->name, 'password' => $request->password])) {
            $user = Auth::user();
            $success['token'] = $user->createToken('MyAuthApp')->plainTextToken;
            $success['username'] = $user->name;
            return $this->sendResponse($success, 'User login successfully!');
        }
        return $this->sendError('Unauthorised', ['error' => 'Unauthorised']);
    }
}
