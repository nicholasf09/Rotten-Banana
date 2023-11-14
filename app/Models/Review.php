<?php

namespace App\Models;

use App\Models\Film;
use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Review extends Model
{
    use HasFactory;

    public $incrementing = false;

    protected $fillable = [
        'id',
        'userId',
        'filmId',
        'rating',
        'komen',
        'like',
    ];

    public function user(){
        return $this->belongsTo(User::class, 'userId');
    }

    public function film(){
        return $this->belongsTo(Film::class, 'filmId');
    }

}
