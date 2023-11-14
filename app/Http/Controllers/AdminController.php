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
        return view('admin.home',[
            'title'=> 'Home'
        ]);
    }

    public function storeFilm(){
        return view('admin.storeFilm',[
            'title'=> 'Store Film'
        ]);
    }


    public function showAllFilm(){
        $films = Film::all();
        $arr = [];
        foreach($films as $film){
            // dd($film['id']);
            $temp['id'] = $film['id'];
            $temp['judul'] = $film['judul'];
            $temp['sinopsis'] = $film['sinopsis'];
            $temp['trailer'] = $film['trailer'];
            $temp['tahun_rilis'] = $film['tahun_rilis'];
            $temp['durasi'] = $film['durasi'];
            $temp['genre'] = $film['genre'];
            $temp['path_image'] = $film['path_image'];
            $arr[] = $temp;
        }
        
        return view('admin.showAllFilm',[
            'title'=> 'Show All Film',
            'films'=> $arr
        ]);
    }

    public function editFilm(Film $film){ 
        return view('admin.editFilm',[ 
            "film" => $film,
            "title" => "Edit Film",
        ]);
    }
}
