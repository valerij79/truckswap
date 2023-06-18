<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subunit extends Model
{
    use HasFactory;

    protected $fillable = [
        'truck',
        'subunit',
        'start_date',
        'end_date'
    ];

    // Define the relationships to the Truck model
    public function Truck()
    {
        return $this->belongsTo(Truck::class, 'truck');
    }

    public function subunitTruck()
    {
        return $this->belongsTo(Truck::class, 'subunit');
    }
}
