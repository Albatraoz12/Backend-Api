<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ulist extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'list_name'
    ];


    public function user()
    {
        $this->belongsTo(User::class);
    }


    public function recipe()
    {
        $this->hasMany(Recipe::class);
    }
}
