<?php

namespace App\Http\Controllers;

use Validator;
use App\Models\Review;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Requests\StoreReviewRequest;
use App\Http\Requests\UpdateReviewRequest;

class ReviewController extends Controller
{
    public function updateReview(Request $request){
        $input = $request->only(['rating']);
        $valid = Validator::make($input, [
            'rating'=> 'required|max:5',
            ],[
                'rating.required' => 'Kolom rating wajib diisi.',
                'rating.max' => 'Rating maksimal 5.',
            ]);
        if($valid->fails()){
            return redirect()->back()->withErrors($valid)->withInput();
        }else{
            $review = Review::where('filmId', $request->filmId)->where('userId', $request->userId)->first();
            $review->rating = $request->rating;
            $review->komen = $request->komen;
            $review->save();
            return response()->json([
                'success' => true,
                'message' => 'Review berhasil diupdate',
                'rating' => $review->rating,
                'komen' => $review->komen,
                'created' => $review->created_at->diffForHumans(),
            ], 200);
        }
    }

    public function storeReview(Request $request){
        $input = $request->only(['rating']);
        $valid = Validator::make($input, [
            'rating'=> 'required|max:5',
            ],[
                'rating.required' => 'Kolom rating wajib diisi.',
                'rating.max' => 'Rating maksimal 5.',
            ]);
        if($valid->fails()){
            return response()->json([
                'success' => false,
                'message' => 'Review gagal ditambahkan',
            ], 400);
        }else{
            $input['id'] = Str::uuid();
            $input['userId'] = $request->userId;
            $input['filmId'] = $request->filmId;
            $input['like'] = 0;
            $input['komen'] = $request->komen;
            $review = Review::create($input);
            if($review){
                return response()->json([
                    'success' => true,
                    'message' => 'Review berhasil ditambahkan',
                    'name' => $review->user->name,
                    'rating' => $review->rating,
                    'komen' => $review->komen,
                    'created' => $review->created_at->diffForHumans(),
                ], 200);
            }else{
                return response()->json([
                    'success' => false,
                    'message' => 'Review gagal ditambahkan',
                ], 400);
            }
        }
    }
}
