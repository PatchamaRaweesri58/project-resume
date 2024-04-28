<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Listexperience extends Model
{
    use HasFactory;
    protected $table = 'listexperiences';
    protected $fillable = 
    [
        'header',
        'head',
        'contents',
    ];
}
