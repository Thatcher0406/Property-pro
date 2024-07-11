<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Apartment extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'location', 'rent', 'status'];

    public function tenants()
    {
        return $this->hasMany(Tenant::class);
    }

    public function bookings()
{
    return $this->hasMany(Booking::class);
}
}
