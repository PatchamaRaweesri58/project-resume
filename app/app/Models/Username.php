<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Sanctum\HasApiTokens;

class Username extends Model
{
    use HasFactory;

    protected $table = 'customer';
    use HasFactory;

    protected $fillable = ['name', 'email', 'password'];
}
