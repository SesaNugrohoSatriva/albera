<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Director extends Model
{
    protected $fillable = ['name', 'position', 'bio', 'photo', 'sort_order'];
}
