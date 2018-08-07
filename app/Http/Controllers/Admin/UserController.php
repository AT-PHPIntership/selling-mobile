<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;
use Exception;
use App\Http\Requests\Backend\UserRequest;
use Illuminate\Support\Facades\Storage;

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
            $users = User::orderBy('created_at', 'desc')->paginate(10);

            return view('backend.pages.user.list', compact('users'));
        } catch (Exception $e) {
            return redirect()->back()->with(['flash' => 'danger', 'message' => __('admin.flash_error')]);
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
        $input = $request->only([
            'username',
            'email',
            'phonenumber',
            'address',
            'avatar',
            'role',
        ]);
        $input['password'] = bcrypt($request->password);
        if ($request->hasFile('avatar')) {
            $avatarName = null;
            $file = $request->file('avatar');
            $path = Storage::disk('public')->put('avatars', $file);
            $avatarName = baseName($path);
            $input['avatar'] = $avatarName;
        }
        User::create($input);

        return redirect('admin/user/create')->with(['flash' => 'success', 'message' => __('admin.flash_success')]);
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
            return redirect()->back()->with(['flash' => 'danger', 'message' => __('admin.flash_error')]);
        }
    }
}
