<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class userList extends Model
{
    use HasFactory;
    protected $fillable = [
        'list_name',
        'recipe_name'
    ];
    public function user()
    {
        $this->belongto(User::class);
    }
}
