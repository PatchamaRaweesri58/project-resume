<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Listfeatured extends Model
{
    use HasFactory;

    protected $table = 'listfeatureds';
    protected $fillable = 
    [
        'header',
        'head',
        'contents',
    ];
}
