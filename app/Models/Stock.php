<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Stock extends Model
{
   protected $fillable = ['name', 'amount', 'category', 'validity'];

   
   public function setValidityAttribute($value)
{
    if (preg_match('/\d{2}\/\d{2}\/\d{4}/', $value)) {
        $this->attributes['validity'] = \Carbon\Carbon::createFromFormat('d/m/Y', $value)->format('Y-m-d');
    } else {
        $this->attributes['validity'] = $value;
    }
}

public function getValidityAttribute($value)
{
    return \Carbon\Carbon::parse($value)->format('d/m/Y');
}

}
