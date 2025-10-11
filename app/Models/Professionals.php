<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Professionals extends Model
{
    protected $fillable = ['name', 'specialty', 'available_times', 'contact'];
}

