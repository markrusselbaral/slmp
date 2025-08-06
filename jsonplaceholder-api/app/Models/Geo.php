<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Geo extends Model
{
    protected $fillable = [
        'lat',
        'lng',
    ];

    /**
     * Get the address associated with the geo.
     */
    public function address()
    {
        return $this->hasOne(Address::class);
    }
}
