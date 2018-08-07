<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;
use Exception;
use Session;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try {
            $users = User::orderBy('created_at', 'desc')->paginate(config('setting.paginate.limit_rows'));

            return view('backend.pages.user.list', compact('users'));
        } catch (Exception $e) {
            Session::flash('message', __('admin.flash_error'));
            Session::flash('alert-class', 'danger');

            return redirect()->back();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param int $id id
     *
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        try {
            $user = User::findOrFail($id);

            return view('backend.pages.user.info', compact('user'));
        } catch (Exception $e) {
            Session::flash('message', __('admin.flash_error'));
            Session::flash('alert-class', 'danger');

            return redirect()->back();
        }
    }
}
