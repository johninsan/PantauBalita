<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Mockery\Exception;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('homepage.home');
    }

    public function registerPost(Request $request)
    {
    	// try{
        $this->validate($request, [
            'name' => 'required|min:4',
            'email' => 'required|unique:users',
            'username' => 'required|unique:users',
            'phone' => 'required|min:4',
            'alamat' => 'required',
                // 'salary' => 'required|numeric',
            'password' => 'required',
            'confirmation' => 'required|same:password',
        ]);
        $data = new User();
        $data->name = $request->name;
        $data->username = $request->username;
        $data->email = $request->email;
        $data->alamat = $request->alamat;
        $data->phone = $request->phone;
        $data->password = bcrypt($request->password);
        $data->save();
        $data->roles()->sync($request->role);
        return redirect('/')->with('alert-success', '<script> window.onload = swal("Sukses!", "akun telah di daftarkan!!", "success")</script>');
          // $confirmation_code['link'] = str_random(30);
          // DB::table('user_activations')->insert(['id_user'=>$data['id'],'token'=>$confirmation_code['link']]);
            //->with('success',"Silahkan cek inbox atau folder spam email anda .");
    }
}
