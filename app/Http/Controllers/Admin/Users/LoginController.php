<?php

namespace App\Http\Controllers\Admin\Users;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class LoginController extends Controller
{
    public function index()
    {
        return view(
            'admin/users/login',
            [
                'title'   =>  'Đăng Nhập Hệ Thống'
            ]
        );
    }
    public function store(Request $request)
    {
        $this->validate($request, [
            'email' => 'required|email:filter',
            'password' => 'required',
        ]);

        if (Auth::attempt([
            'email' => $request->input('email'),
            'password' => $request->input('password'),
            'level' => 1,
        ], $request->input('remember'))) {
            return redirect()->route('admin');
        }
        if (Auth::attempt([
            'email' => $request->input('email'),
            'password' => $request->input('password'),
            'level' => 0,
        ], $request->input('remember'))) {
            return redirect()->route('member');
        }
        Session::flash('error', 'sai tai khoan hoac mat khau');
        return redirect()->back();
    }
}
