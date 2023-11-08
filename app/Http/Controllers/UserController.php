<?php

namespace App\Http\Controllers;

use Validator;
use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function home(){
        return view('user.home',[
            'title'=> 'Home'
        ]);
    }

    public function signup(){
        return view('user.signup',[
            'title'=> 'Sign Up'
        ]);
    }

    public function create(Request $request){
        $input = $request->only(['name', 'email', 'password']);
        $valid = Validator::make($input, [
            'name'=> 'required',
            'email'=> 'required|email',
            'password'=> 'required',
            ],[
                'name.required' => 'Kolom nama wajib diisi.',
                'email.required' => 'Kolom email wajib diisi.',
                'email.email' => 'Email harus berformat valid.',
                'password.required' => 'Kolom password wajib diisi.',
            ]);

            if($valid->fails()){
                return redirect()->back()->withErrors($valid)->withInput();
            }else{
                $input['id'] = Str::uuid();
                $input['password'] = bcrypt($input['password']);
                $user = User::create($input);
                if($user){
                    Auth::login($user);
                    return redirect()->route('user.home');
                }else{
                    return redirect()->back()->withErrors('Login gagal')->withInput();
                }
            }
    }

}
