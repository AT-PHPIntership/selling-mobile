<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;
use Exception;
use App\Http\Requests\Backend\UserRequest;
use Illuminate\Support\Facades\Storage;
use Session;
use App\Traits\UploadAvatar;

class UserController extends Controller
{
    use UploadAvatar;

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
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.pages.user.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request Request
     *
     * @return \Illuminate\Http\Response
     */
    public function store(UserRequest $request)
    {
        try {
            $input = $request->all();
            $input['password'] = bcrypt($request->password);
            $checkFile = $request->hasFile('avatar');
            $file = $request->file('avatar');
            $input['avatar'] = $this->uploadAvatar($checkFile, $file);
            User::create($input);
            Session::flash('message', __('admin.flash_success'));
            Session::flash('alert-class', 'success');

            return redirect('admin/users');
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
