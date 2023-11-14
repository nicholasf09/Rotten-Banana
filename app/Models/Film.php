<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Film extends Model
{
    use HasFactory;
    public $incrementing = false;

    protected $fillable = [
        'id',
        'sinopsis',
        'trailer',
        'judul',
        'tahun_rilis',
        'durasi',
        'genre',
        'path_image'
    ];

    public function review(){
        return $this->hasMany(Review::class, 'filmId');
    }

}
