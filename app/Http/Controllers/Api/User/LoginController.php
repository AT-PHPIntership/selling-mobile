<?php

namespace App\Http\Controllers\Api\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Response;
use App\Http\Controllers\Api\ApiController;
use App\Models\User;
use App\Http\Requests\User\RegisterRequest;
use Exception;
use Illuminate\Support\Facades\Input;


class LoginController extends ApiController
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('public.pages.register');
    }

    /**
     * Login as user
     *
     * @return json authentication code
     */
    public function login()
    {
        if (Auth::attempt(['email' => request('email'), 'password' => request('password')])) {
            $user = Auth::user();
            $data['user'] = $user;
            $data['token'] =  $user->createToken('token')->accessToken;
            return $this->successResponse($data, Response::HTTP_OK);
        } else {
            return $this->errorResponse(config('define.login.unauthorised'), Response::HTTP_UNAUTHORIZED);
        }
    }

    /**
     * Logout
     *
     * @return 204
     */
    public function logout()
    {
        $user = Auth::user();
        $accessToken = $user->token();
        $accessToken->revoke();
        return $this->successResponse(null, Response::HTTP_NO_CONTENT);
    }

    /**
     * Register user
     *
     * @param App\Http\Requests\User\RegisterRequest $request request
     *
     * @return json authentication code with user info
     */
    public function register(RegisterRequest $request)
    {
        try {
            $input = $request->except('password');
            $input['password'] = bcrypt($request->password);
            $user = User::create($input);
            $data['token'] =  $user->createToken('token')->accessToken;
            $data['user'] =  $user;
            return $this->successResponse($data, Response::HTTP_OK);
        } catch(Exception $ex) {
            return $this->errorResponse('fail login!', Response::HTTP_UNAUTHORIZED);
        }
        
    }
}
