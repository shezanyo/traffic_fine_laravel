<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Fine extends Model
{
    use HasFactory;

    protected $table = 'fines';
    protected $primaryKey = 'fineid';

    protected $fillable = [
        'name',
        'date',
        'location',
        'description',
        'amount',
        'status',
        'driver_id',
        'police_id',
        'vehicle_id', // Use the correct column name
    ];

    public function driver()
    {
        return $this->belongsTo(Driver::class, 'driver_id', 'id');
    }

    public function police()
    {
        return $this->belongsTo(Police::class, 'police_id', 'id');
    }

    public function vehicle()
    {
        return $this->belongsTo(Vehicle::class, 'vehicle_id', 'id'); // Correct foreign key
    }
}
