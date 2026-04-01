<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cv extends Model
{
    protected $fillable = [
        'cv_path',
        'ratings',
        'designations',
    ];
}
