<?php

namespace App\Http\Controllers\Api\User;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Controllers\Api\ApiController;
use App\Models\User;
use Auth;

class UserController extends ApiController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::user();
        return $this->showOne($user, Response::HTTP_OK);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request request
     *
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $updatedUser = $request->only(['username' ,'phonenumber', 'address', 'avatar']);
        $user = Auth::user();
        try {
            $user->update($updatedUser);
            return $this->showOne($user, Response::HTTP_OK);
        } catch (Exception $e) {
            return $this->errorResponse(trans('messages.update_user_fail'), Response::HTTP_BAD_REQUEST);
        }
    }
}
