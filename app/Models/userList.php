<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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
}
