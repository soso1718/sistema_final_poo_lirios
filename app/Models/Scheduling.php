<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Scheduling extends Model
{
    protected $fillable = ['patient_id', 'service', 'time', 'date', 'notes', 'professional', 'patient_name'];

    public function getDateAttribute($value)
    {
        return Carbon::parse($value)->format('d/m/Y');
    }
}

