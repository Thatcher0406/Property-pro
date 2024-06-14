<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Landlord extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'email', 'phone'];

    public function properties()
    {
        return $this->hasMany(Property::class);
    }
}
