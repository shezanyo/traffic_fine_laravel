<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Driver extends Model
{
    use HasFactory;

    // Define the table name (optional if the model name matches the table name)
    protected $table = 'drivers';

    // Allow mass assignment for these attributes
    protected $fillable = [
        'first_name',
        'last_name',
        'license_number',
        'license_issue_date',
        'license_expiry_date',
        'user_id',
    ];

    // Relationships
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function fines()
    {
        return $this->hasMany(Fine::class, 'driverid', 'id');
    }
}
