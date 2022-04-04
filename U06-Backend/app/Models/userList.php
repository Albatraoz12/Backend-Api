<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class UserList extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'list_name',
    ];

    public function user()
    {
        $this->belongto(User::class);
    }

    public function recipe()
    {
        $this->hasMany(Recipe::class);
    }
}
