<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Experience extends Model
{
    use HasFactory;

    protected $table = 'experiences';

    protected $fillable = [
        'header',
        'head',
        'contents',
    ];

    public function decryptFrontEnd($type, $name) {
        if ($type == "model") {
            if ($name == "aaaa") {
                return "Education";
            } elseif ($name == "bbbb") {
                return "Experience";
            }
        } elseif ($type == "route") {
            if ($name == "xxxx") {
                return "Education";
            } elseif ($name == "yyyy") {
                return "Experience";
            }
        }
    }
}

