<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class loginController extends Controller
{
    public function adminlogin()
    {
        return view('admin.login');
    }
    public function index()
    {
        return view('admin.home');
    }
    public function loginPost(Request $request)
    {
        try {
            $username = $request->username;
            $password = $request->password;

            $data = User::where('username', $username)->first();
            if ($data->count() > 0) { //apakah username tersebut ada atau tidak
                if (Hash::check($password, $data->password)) {
                    Session::put('id', $data->id);
                    Session::put('login', true);
                    return redirect('/')->with('alert-success', '<script> window.onload = swal("Sukses!", "Login berhasil!!", "success")</script>');
                } else {
                    return redirect('/')->with('alert-success', '<script> window.onload = swal ( "Oops !" ,  "Password atau Email kamu Salah!" ,  "error" )</script>');
                }
            } else {
                return redirect('/')->with('alert-success', '<script> window.onload = swal ( "Oops !" ,  "Password atau Email kamu Salah!" ,  "error" )</script>');
            }
        } catch (Exception $e) {
            return response($e->getMessage());
        }
    }
}
