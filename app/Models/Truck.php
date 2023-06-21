<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Truck extends Model
{
    protected $fillable = [
        'unit_number',
        'year',
        'notes'
    ];

    public function mainSubunits()
    {
        return $this->hasMany(Subunit::class, 'main_truck_id');
    }

    public function subunitSubunits()
    {
        return $this->hasMany(Subunit::class, 'subunit_truck_id');
    }
}

