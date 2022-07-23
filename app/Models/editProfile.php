<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class editProfile extends Model
{
    use HasFactory;
    protected $fillable = [
        'nama', 'username', 'password', 'picture'
    ];
}
