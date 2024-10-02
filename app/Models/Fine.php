<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Fine extends Model
{
    use HasFactory;

    // Define the table associated with the model
    protected $table = 'fines';

    // Define the primary key
    protected $primaryKey = 'fineid';

    // Specify the fields that can be mass-assigned
    protected $fillable = [
        'date',
        'location',
        'description',
        'amount',
        'user_id',
        'policeid',
    ];

    // If timestamps are disabled in your migration file, set this to false
    public $timestamps = true;

    // Add relationships if needed (optional)
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function police()
    {
        return $this->belongsTo(Police::class, 'policeid');
    }
}
