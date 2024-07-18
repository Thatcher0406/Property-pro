<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Apartment extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'address', 'units', 'location', 'rent', 'landlord_id'];

    public function landlord()
    {
        return $this->belongsTo(Landlord::class, 'landlord_id');
    }

    public function tenants()
    {
        return $this->hasMany(Tenant::class);
    }

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
