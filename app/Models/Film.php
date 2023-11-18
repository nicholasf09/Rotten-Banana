<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Film extends Model
{
    use HasFactory;
    protected $primaryKey = 'id';
    public $incrementing = false;

    protected $fillable = [
        'id',
        'sinopsis',
        'trailer',
        'judul',
        'tahun_rilis',
        'durasi',
        'genre',
        'path_image',
        'pg',
        'director',
        'tagline',
        'like'
    ];

    public function review(){
        return $this->hasMany(Review::class, 'filmId');
    }
    public function user(){
        return $this->belongsToMany(User::class, 'film_user', 'filmId', 'userId');
    }


}
