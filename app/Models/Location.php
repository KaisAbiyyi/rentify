<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Location extends Model
{
    use HasFactory, HasUuids;

    public $incrementing = false;
    protected $keyType = 'string';

    protected $fillable = [
        'name',
        'address',
        'city',
        'state',
        'postal_code',
    ];

    // Relasi ke model Rental sebagai pickup location
    public function pickups()
    {
        return $this->hasMany(Rental::class, 'pickup_location_id');
    }

    // Relasi ke model Rental sebagai return location
    public function returns()
    {
        return $this->hasMany(Rental::class, 'return_location_id');
    }
}
