<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Recipe extends Model
{
    use HasFactory;
    protected $fillable = [
        'title',
        'image',
        'recipe_id'
    ];

    public function recipe() {
        $this->belongto(userList::class);
    }
}
