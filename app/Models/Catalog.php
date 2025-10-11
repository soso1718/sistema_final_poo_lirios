<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Catalog extends Model
{
    protected $fillable = ['name', 'price', 'description', 'average_time', 'materials_used', 'contraindications'];

}
