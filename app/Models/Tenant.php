<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tenant extends Model
{
    use HasFactory;

    protected $fillable = [ 'user_id','phone', 'dob'];

    public function bookings()
{
    return $this->hasMany(Booking::class);
}

public function applications()
    {
        return $this->hasMany(Application::class);
    }

    public function appointments()
    {
        return $this->hasMany(Appointment::class);
    }
}
