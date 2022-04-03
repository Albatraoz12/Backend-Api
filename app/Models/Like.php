<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Like extends Model
{
    use HasFactory;
    protected $fillable = [
        'title',
        'image',
        'recipe',
        'user_id'
    ];


    public function user()
    {
        $this->belongto(User::class);
    }
}
