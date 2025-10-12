<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Scheduling extends Model
{
    protected $fillable = ['client_name', 'service', 'start', 'end', 'notes'];
}

