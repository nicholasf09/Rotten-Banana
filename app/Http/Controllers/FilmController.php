<?php

namespace App\Http\Controllers;

use Validator;
use App\Models\Film;
use App\Models\Review;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class FilmController extends Controller
{
    public function getAllFilm(Request $request){
        $films = [];

        if($request->search == null && $request->genre == null){
            $films = Film::all();
        }
        else if($request->search != null && $request->genre == null){
            $films = Film::where('judul', 'like' ,'%'.$request->search.'%')->get();
        }
        else if ($request->search == null && $request->genre != null) {
            $films = Film::where('genre', 'like' ,'%'.$request->genre.'%')->get();
        }
        else{
            $films = Film::where('judul', 'like' ,'%'.$request->search.'%')->where('genre', 'like' ,'%'.$request->genre.'%')->get();
        }
        return response()->json([
            'success' => true,
            'message' => 'List Semua Film',
            'data' => $films,
        ], 200);
    }

    public function createFilm(Request $request){
        // dd($request['judul'] . ' ' . $request['genre'] . ' ' . $request['tahun'] . ' ' . $request['durasi'] . ' ' . $request['sinopsis'] . ' ' . $request['poster'] . ' ' . $request['trailer'] . ' ' . $request['image']);
        // dd($request->file('image'));

        $input = $request->only(['judul', 'genre', 'tahun_rilis', 'durasi', 'sinopsis', 'poster', 'trailer', 'image']);
        $valid = Validator::make($input, [
            'judul'=> 'required', 
            'sinopsis'=> 'required',
            'trailer'=> 'required',
            'tahun_rilis' => 'required|date_format:Y-m-d',
            'durasi'=> 'required',
            'genre'=> 'required',
            'image'=> 'required'
        ], [
            'judul.required' => 'Judul wajib diisi.',
            'sinopsis.required'=> 'Sinopsis wajib diisi',
            'trailer.required'=> 'Trailer wajib diisi',
            'tahun_rilis.required'=> 'Tanggal rilis wajib diisi',
            'tahun_rilis.date_format'=> 'Tanggal rilis tidak valid',
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
            $input['like'] = 0;
            Film::create($input);
            return redirect()->route('admin.showAllFilm')->with('success','Film berhasil ditambahkan');
        }
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

    public function likeFilm(Film $film){
        
        // $user = $film->user()->where('userId', auth()->user()->id)->first()->pivot->userI;
        // if(!$user){
        $film->user()->attach(auth()->user()->id);
        $film->like = $film->like + 1;
        $film->save();
        return response()->json([
            'success' => true,
            'sudah' => false,
            'message' => "Like berhasil diupdate",
            'like' => $film->like,
        ], 200);
        // }

        // return response()->json([
        //     'success' => true,
        //     'sudah' => true,
        //     'message' => "Like gagal diupdate",
        //     'like' => $film->like,
        // ], 200);
    }

    public function unlikeFilm(Film $film){
        // $user = $film->user()->where('userId', auth()->user()->id)->first()->pivot;
        // if($user){
        $film->user()->detach(auth()->user()->id);
        $film->like = $film->like - 1;
        $film->save();
        return response()->json([
            'success' => true,
            'sudah' => true,
            'message' => "Unlike berhasil diupdate",
            'like' => $film->like,
        ], 200);
        // }

    //     return response()->json([
    //         'success' => true,
    //         'sudah' => false,
    //         'message' => "Unlike gagal diupdate",
    //         'like' => $film->like,
    //     ], 200);
    }

}
