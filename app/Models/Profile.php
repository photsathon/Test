<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    use HasFactory;

    protected $table = "users";
    protected $fillable = [
        'username',
        'firstname',
        'lastname',
        'picture',
        'picturename',
        'password',
    ];
}