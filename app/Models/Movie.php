<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Movie extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'director', 'imageUrl', 'duration', 'releaseDate', 'genre'];

    public function search($title) {
        return Movie::where('title', 'like', '%' . $title . '%')->get();
    }
}
