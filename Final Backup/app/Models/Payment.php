<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use HasFactory;

    // Define the fillable fields
    protected $fillable = [
        'UserID',
        'EventID',
        'status',
    ];

    // Define the relationship with the User model
    public function user()
    {
        return $this->belongsTo(User::class, 'UserID'); // Use 'UserID' as the foreign key
    }

    // Define the relationship with the Event model
    public function event()
    {
        return $this->belongsTo(Event::class, 'EventID'); // Use 'EventID' as the foreign key
    }
}
