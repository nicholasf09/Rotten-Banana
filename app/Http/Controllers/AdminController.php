<?php

namespace App\Http\Controllers;

use Validator;
use App\Models\Film;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AdminController extends Controller
{
    public function home(){
        $films = Film::all();
        // dd($films);
        return view('admin.home', [
            'title' => 'Films',
            'films' => $films,
            'button' => null
        ]);
    }

    public function storeFilm(){
        return view('admin.storeFilm',[
            'title'=> 'Store Film'
        ]);
    }


    public function showAllFilm(){
        $films = Film::all()->toArray();
        
        // dd($films);
        return view('admin.showAllFilm',[
            'title'=> 'Show All Film',
            'films'=> $films
        ]);
    }

    public function editFilm(Film $film){ 
        return view('admin.editFilm',[ 
            "film" => $film,
            "title" => "Edit Film",
        ]);
    }
}
