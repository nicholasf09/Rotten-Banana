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

    public function createFilm(Request $request){
        // dd($request['judul'] . ' ' . $request['genre'] . ' ' . $request['tahun'] . ' ' . $request['durasi'] . ' ' . $request['sinopsis'] . ' ' . $request['poster'] . ' ' . $request['trailer'] . ' ' . $request['image']);
        // dd($request->file('image'));

        $input = $request->only(['judul', 'genre', 'tahun_rilis', 'durasi', 'sinopsis', 'poster', 'trailer', 'image']);
        $valid = Validator::make($input, [
            'judul'=> 'required', 
            'sinopsis'=> 'required',
            'trailer'=> 'required',
            'tahun_rilis' => 'required',
            'durasi'=> 'required',
            'genre'=> 'required',
            'image'=> 'required'
        ], [
            'judul.required' => 'Judul wajib diisi.',
            'sinopsis.required'=> 'Sinopsis wajib diisi',
            'trailer.required'=> 'Trailer wajib diisi',
            'tahun_rilis.required'=> 'Tanggal rilis wajib diisi',
            'durasi.required'=> 'Durasi wajib diisi',
            'genre.required'=> 'Genre wajib diisi',
            'image.required'=> 'Image wajib diisi'
        ]);

        if($valid->fails()){
            return redirect()->back()->withErrors($valid)->withInput();
        }
        else{
            if($request->hasFile('image')){
                $file = $request->file('image');
                $namaFile = time() . $file->getClientOriginalName();
                $path = $file->storeAs('uploads/films', $namaFile, 'public');
                $input['path_image'] = $path;
            }
            $input['id'] = Str::uuid();
            Film::create($input);
            return redirect()->route('admin.showAllFilm')->with('success','Film berhasil ditambahkan');
        }
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

    public function updateFilm(Request $request){
        $input = $request->only(['judul', 'genre', 'tahun_rilis', 'durasi', 'sinopsis', 'poster', 'trailer']);
        $valid = Validator::make($input, [
            'judul'=> 'required', 
            'sinopsis'=> 'required',
            'trailer'=> 'required',
            'tahun_rilis' => 'required',
            'durasi'=> 'required',
            'genre'=> 'required',
        ], [
            'judul.required' => 'Judul wajib diisi.',
            'sinopsis.required'=> 'Sinopsis wajib diisi',
            'trailer.required'=> 'Trailer wajib diisi',
            'tahun_rilis.required'=> 'Tanggal rilis wajib diisi',
            'durasi.required'=> 'Durasi wajib diisi',
            'genre.required'=> 'Genre wajib diisi',
        ]);

        if($valid->fails()){
            return redirect()->back()->withErrors($valid)->withInput();
        }
        else{
            $pathImage = $request['path_image'];
            if($request->hasFile('image')){
                $file = $request->file('image');
                $namaFile = time() . $file->getClientOriginalName();
                $path = $file->storeAs('uploads/films', $namaFile, 'public');
                $pathImage = $path;
                if (Storage::disk('public')->exists($request['path_image'])) {
                    Storage::disk('public')->delete($request['path_image']);
                }
            }
            // dd($request['judul']);
            $film = Film::find($request['id']);
            $film->judul = $input['judul'];
            $film->sinopsis = $request['sinopsis'];
            $film->trailer = $request['trailer'];
            $film->tahun_rilis = $request['tahun_rilis'];
            $film->durasi = $request['durasi'];
            $film->genre = $request['genre'];
            $film->path_image = $pathImage;
            $film->save();

            return redirect()->route('admin.showAllFilm')->with('success','Film berhasil diupdate');
        }
    }

}
