<?php

namespace App\Http\Controllers;

use Validator;
use App\Models\Film;
use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function home()
    {
        return view('user.home', [
            'title' => 'Home'
        ]);
    }
    public function front()
    {
        return view('user.front', [
            'title' => 'front'
        ]);
    }

    public function signup()
    {
        return view('user.signup', [
            'title' => 'Sign Up'
        ]);
    }

    public function filmMain()
    {
        $data = Film::all();
        return view('user.filmMain', [
            'data' => $data,
            'title' => 'film'
        ]);
    }

    public function create(Request $request)
    {
        $input = $request->only(['name', 'email', 'password']);
        $valid = Validator::make($input, [
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required',
        ], [
            'name.required' => 'Kolom nama wajib diisi.',
            'email.required' => 'Kolom email wajib diisi.',
            'email.email' => 'Email harus berformat valid.',
            'password.required' => 'Kolom password wajib diisi.',
        ]);

        if ($valid->fails()) {
            return redirect()->back()->withErrors($valid)->withInput();
        } else {
            $input['id'] = Str::uuid();
            $input['password'] = bcrypt($input['password']);
            $user = User::create($input);
            if ($user) {
                Auth::login($user);
                return redirect()->route('user.home');
            } else {
                return redirect()->back()->withErrors('Login gagal')->withInput();
            }
        }
    }

    public function showAllFilm()
    {
        $films = Film::with('review')->get()->map(function ($film) {
            $film->avgRating = $film->review->avg('rating') ?? 0;
            return $film;
        });
        // dd($films);
        return view('user.showAllFilm', [
            'title' => 'Films',
            'films' => $films,

        ]);
    }

    public function showFilm(Film $film)
    {
        $user = $film->user()->where('userId', auth()->user()->id)->first()->pivot ?? null;
        $totalRating = $film->review->sum('rating') ?? 0;
        $jumlahReview = $film->review->count() ?? 0;
        $review = $film->review->where('userId', Auth::user()->id)->first();
        $reviews = $film->review;
        $allReview = [];

        $sudahLike = false;
        if ($user) {
            $sudahLike = true;
        }

        foreach ($reviews as $r) {
            $allReview[] = [
                'name' => $r->user->name,
                'rating' => $r->rating,
                'komen' => $r->komen,
                'created' => $r->created_at->diffForHumans(),
                'id' => $r->id,
            ];
        }

        if (!empty($review)) {
            $reviewUser['name'] = $review->user->name;
            $reviewUser['rating'] = $review->rating;
            $reviewUser['komen'] = $review->komen;
            $reviewUser['created'] = $review->created_at->diffForHumans();
            $reviewUser['id'] = $review->id;
            return view('user.showFilm', [
                'title' => 'Film',
                'film' => $film,
                'review' => $reviewUser,
                'allReview' => $allReview,
                'jumlahReview' => $jumlahReview,
                'totalRating' => $totalRating,
                'like' => $sudahLike,
            ]);
        }

        $review = [];
        // dd($allReview);
        return view('user.showFilm', [
            'title' => 'Film',
            'film' => $film,
            'review' => $review,
            'allReview' => $allReview,
            'jumlahReview' => $jumlahReview,
            'totalRating' => $totalRating,
            'like' => $sudahLike,
        ]);

    }
}
