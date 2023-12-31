<?php

namespace App\Http\Controllers;

use App\Models\Review;
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
        $kdramas = Film::where('genre', 'like', '%' . 'kdrama' . '%')->inRandomOrder()->limit(10)->get();
        $animes = Film::where('genre', 'like', '%' . 'anime' . '%')->inRandomOrder()->limit(10)->get();
        $rating = Film::withCount('review')->get()->map(function ($film) {
            $film->avgRating = $film->review->avg('rating') ?? 0;
            return $film;
        })->sortByDesc('avgRating')->take(5);
        $popular = $rating->sortByDesc('like')->take(5);

        return view('user.home', [
            'title' => 'Home',
            'kdramas' => $kdramas,
            'animes' => $animes,
            'rating' => $rating,
            'popular' => $popular,
        ]);
    }

    public function signup()
    {
        return view('user.signup', [
            'title' => 'Sign Up'
        ]);
    }

    public function logout(Request $request)
    {
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        Auth::logout();
        return 'logout';
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
            'button' => null
        ]);
    }

    public function showAllFilmButton($button)
    {
        $films = Film::with('review')->get()->map(function ($film) {
            $film->avgRating = $film->review->avg('rating') ?? 0;
            return $film;
        });
        // dd($films);
        return view('user.showAllFilm', [
            'title' => 'Films',
            'films' => $films,
            'button' => $button

        ]);
    }

    public function filmMain(Film $film)
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
                'akunId' => $r->user->id,
            ];
        }

        if (!empty($review)) {
            $reviewUser['name'] = $review->user->name;
            $reviewUser['rating'] = $review->rating;
            $reviewUser['komen'] = $review->komen;
            $reviewUser['created'] = $review->created_at->diffForHumans();
            $reviewUser['id'] = $review->id;
            return view('user.filmMain', [
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
        return view('user.filmMain', [
            'title' => 'Film',
            'film' => $film,
            'review' => $review,
            'allReview' => $allReview,
            'jumlahReview' => $jumlahReview,
            'totalRating' => $totalRating,
            'like' => $sudahLike,
        ]);
    }


    public function profile(User $user)
    {
        $review = Review::with('film')
            ->where('userId', $user->id)
            ->orderBy('created_at', 'desc')
            ->take(10)
            ->get()
            ->map(function ($review) {
                $review->created = $review->created_at->diffForHumans();
                return $review;
            })
            ->toArray();


        $favorite = $user->film()
            ->orderBy('created_at', 'desc')
            ->take(10)
            ->get()->toArray();

            // dd($review);

        // dd($review);
        return view('user.profile', [
            'title' => 'Profile',
            'user' => $user,
            'review' => $review,
            'favorite' => $favorite,
        ]);
    }

    public function editProfile(Request $request){
        $input = $request->only(['name', 'password']);
        $valid = Validator::make($input, [
            'name' => 'required',
            'password' => 'required',
        ], [
            'name.required' => 'Kolom nama wajib diisi.',
            'password.required' => 'Kolom password wajib diisi.',
        ]);

        if ($valid->fails()) {
            return redirect()->back()->withErrors($valid)->withInput();
        } else {
            $input['password'] = bcrypt($input['password']);
            $user = User::where('id', auth()->user()->id)->update($input);
            if ($user) {
                return redirect()->route('user.profile',[auth()->user()->id])->with('success', 'Edit Profile berhasil');
            } else {
                return redirect()->back()->withErrors('Edit Profile gagal')->withInput();
            }
        }
    }
}
