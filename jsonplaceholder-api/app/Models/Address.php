<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Address extends Model
{

    protected $fillable = [
        'street',
        'suite',
        'city',
        'zipcode',
    ];

    public function geo() 
    {
        return $this->belongsTo(Geo::class);
    }

}
