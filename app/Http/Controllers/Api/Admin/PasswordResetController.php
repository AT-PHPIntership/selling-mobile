<?php

namespace App\Http\Controllers\Api\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Notifications\PasswordResetRequest;
use App\Notifications\PasswordResetSuccess;
use App\Models\PasswordReset;
use App\Models\User;
use Carbon\Carbon;

class PasswordResetController extends Controller
{
    /**
     * Display a form reset.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('backend.pages.user.reset-pwd');
    }

    /**
     * Create token password reset
     *
     * @param \Illuminate\Http\Request $request request
     *
     * @return [string] message
     */
    public function create(Request $request)
    {
        $user = User::where('email', $request->email)->first();
        if (!$user) {
            return response()->json([
                'message' => 'We can`t find a user with that e-mail address.'
            ], 404);
        }

        $passwordReset = PasswordReset::updateOrCreate(
            ['email' => $user->email],
            [
                'email' => $user->email,
                'token' => str_random(60)
            ]
        );
        if ($user && $passwordReset) {
            $user->notify(
                //send email notification
                new PasswordResetRequest($passwordReset->token)
            );
        }
        // return response()->json([
        //     'message' => 'We have e-mailed your password reset link!'
        // ]);
        return "<h4>We have e-mailed your password reset link!</br>Please check your mail!</h4>";
    }
  
    /**
     * Find token password reset
     *
     * @param \Illuminate\Http\Request $request request
     *
     * @return [string] message
     */
    public function find(Request $request)
    {
        $passwordReset = PasswordReset::where('token', $request->token)->first();
        //case1: không tồn tại token
        if (!$passwordReset) {
            return response()->json([
                'message' => 'This password reset token is invalid.'
            ], 404);
        }
        //case2: token được tạo quá 12h
        if (Carbon::parse($passwordReset->updated_at)->addMinutes(720)->isPast()) {
            $passwordReset->delete();
            return response()->json([
                'message' => 'This password reset token is past.'
            ], 404);
        }
        //case3: success
        //return response()->json($passwordReset);
        return view('backend.pages.user.change-pwd', compact('passwordReset'));
    }

    /**
     * Reset password
     *
     * @param \Illuminate\Http\Request $request request
     *
     * @return [string] message
     */
    public function reset(Request $request)
    {
        //dd($request->toArray());
        $request->validate([
            'email' => 'required|string|email',
            'password' => 'required|string|confirmed',
            'token' => 'required|string',
            'password_confirmation' => 'required|string'
        ]);
        $passwordReset = PasswordReset::where([
            ['token', $request->token],
            ['email', $request->email]
        ])->first();
        //case1: fail
        if (!$passwordReset) {
            return response()->json([
                'message' => 'This password reset token is invalid.'
            ], 404);
        }

        $user = User::where('email', $passwordReset->email)->first();

        //case2: fail
        if (!$user) {
            return response()->json([
                'message' => 'We can`t find a user with that e-mail address.'
            ], 404);
        }

        //case3: success
        $user->password = bcrypt($request->password);//updatepass
        $user->save();
        $passwordReset->delete();//delete token resetPass
        $user->notify(new PasswordResetSuccess($passwordReset));//send email notification success
        //return response()->json($user);
        return url("/admin/login");
    }
}
