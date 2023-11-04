<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function home(){
        return view('admin.home',[
            'title'=> 'Home'
        ]);
    }

    public function storeFilm(){
        return view('admin.storeFilm',[
            'title'=> 'Store Film'
        ]);
    }
}
