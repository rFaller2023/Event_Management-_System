<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'start_time',
        'end_time',
        'venue_id',
        'organizer_id',
    
    ];

    public function venue(){
        return $this->hasOne(Venue::class);
    }
    public function schedule()
    {
        return $this->hasMany(Schedule::class);
    }
    public function tickets()
    {
        return $this->hasMany(Ticket::class);
    }
    

    
}
 