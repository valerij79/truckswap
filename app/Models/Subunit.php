<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subunit extends Model
{
    protected $fillable = [
        'main_truck_id',
        'subunit_truck_id',
        'start_date',
        'end_date'
    ];
    public function mainTruck()
    {
        return $this->belongsTo(Truck::class, 'main_truck_id');
    }

    public function subunitTruck()
    {
        return $this->belongsTo(Truck::class, 'subunit_truck_id');
    }
}

