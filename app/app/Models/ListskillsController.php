<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ListskillsController extends Model
{
    use HasFactory;

    protected $table = 'listskills_controllers';
    protected $fillable = 
    [
        'header',
        'head',
        'contents',
    ];
}
