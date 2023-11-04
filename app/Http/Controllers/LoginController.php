<?php

namespace App\Http\Controllers;

use Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function loginAdmin(){
        return view("admin.login",[
            "title"=> "Login",
        ]);
    }

    public function cekLoginAdmin(Request $request){
        $input = $request->only(['email', 'password']);
        $valid = Validator::make($input, [
            'email'=> 'required|email',
            'password'=> 'required',
            ],[
                'email.required' => 'Kolom email wajib diisi.',
                'email.email' => 'Email harus berformat valid.',
                'password.required' => 'Kolom password wajib diisi.',
            ]);

            if($valid->fails()){
                return redirect()->back()->withErrors($valid)->withInput();
            }else{
                if(Auth::attempt($input)){
                    return redirect()->route('admin.home');
                }
                else{
                    return redirect()->back()->withErrors('Login gagal')->withInput();
                }
            }
    }

    public function loginUser(){
        return view("user.login",[
            "title"=> "Login",
        ]);
    }

    public function cekLoginUser(Request $request){
        $input = $request->only(['email', 'password']);
        $valid = Validator::make($input, [
            'email'=> 'required|email',
            'password'=> 'required',
            ],[
                'email.required' => 'Kolom email wajib diisi.',
                'email.email' => 'Email harus berformat valid.',
                'password.required' => 'Kolom password wajib diisi.',
            ]);

            if($valid->fails()){
                return redirect()->back()->withErrors($valid)->withInput();
            }else{
                if(Auth::attempt($input)){
                    return redirect()->route('admin.home');
                }
                else{
                    return redirect()->back()->withErrors('Login gagal')->withInput();
                }
            }
    }

}
