<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rakuhai extends Model
{
    use HasFactory;
    protected $table = 'users';
    protected $fillable = [
        'name',
        'kana',
        'tel',
        'email',
        'body',
        'updated_at',
    ];
}
