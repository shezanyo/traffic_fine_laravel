<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Fine extends Model
{
    use HasFactory;

    // Define the table name (optional if the model name matches the table name)
    protected $table = 'fines';

    // Specify the primary key column (optional if the default 'id' is used)
    protected $primaryKey = 'fineid';

    // Allow mass assignment for these attributes
    protected $fillable = [
        'name',
        'date',
        'location',
        'description',
        'amount',
        'status',
        'driverid',
        'policeid',
        'vehicleid',
    ];

    // Define relationships
    public function driver()
    {
        return $this->belongsTo(Driver::class, 'driverid', 'id');
    }

    public function police()
    {
        return $this->belongsTo(Police::class, 'policeid', 'id');
    }

    public function vehicle()
    {
        return $this->belongsTo(Vehicle::class, 'vehicleid', 'id');
    }
}
