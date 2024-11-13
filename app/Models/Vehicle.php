<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vehicle extends Model
{
    use HasFactory, HasUuids;

    public $incrementing = false;
    protected $keyType = 'string';

    public const STATUS_AVAILABLE = 'available';
    public const STATUS_RENTED = 'rented';
    public const STATUS_MAINTENANCE = 'maintenance';

    protected $fillable = [
        'name',
        'model',
        'year',
        'license_plate',
        'price_per_day',
        'status',
    ];

    // Fungsi untuk memeriksa apakah kendaraan tersedia
    public function isAvailable()
    {
        return $this->status === self::STATUS_AVAILABLE;
    }
}
