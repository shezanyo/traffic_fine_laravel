<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Police extends Model
{
    use HasFactory;

    // Define the table name (optional if the model name matches the table name)
    protected $table = 'police';

    // Allow mass assignment for these attributes
    protected $fillable = [
        'name',
        'batchnumber',
        'area_of_work',
    ];

    // Relationships
    public function fines()
    {
        return $this->hasMany(Fine::class, 'policeid', 'id');
    }
}
