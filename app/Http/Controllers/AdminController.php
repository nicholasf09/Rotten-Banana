<?php

namespace App\Http\Controllers;

use App\Models\Review;
use Validator;
use App\Models\Film;
use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;


class AdminController extends Controller
{
    public function home(){
        $films = Film::all();
        $totalFilm = $films->count();
        $users = User::all();
        $totalUser = $users->count();
        $reviews = Review::all();
        $totalReview = $reviews->count();
        $totalLike = $films->sum('like');

        
        // dd($films);
        return view('admin.home', [
            'title' => 'Films',
            'totalFilm' => $totalFilm,
            'totalUser' => $totalUser,
            'totalReview' => $totalReview,
            'totalLike' => $totalLike,
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

    public function logout(Request $request)
    {
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        Auth::logout();
        return redirect()->back();
    }
}
