<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vehicle extends Model
{
    use HasFactory;

    // Define the table name (optional if the model name matches the table name)
    protected $table = 'vehicles';

    // Allow mass assignment for these attributes
    protected $fillable = [
        'vehicle_model',
        'vehicle_type',
        'vehicle_color',
        'registration_number',
        'user_id',
    ];

    // Relationships
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function fines()
    {
        return $this->hasMany(Fine::class, 'vehicleid', 'id');
    }
}
