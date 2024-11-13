<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rental extends Model
{
    use HasFactory, HasUuids;

    public $incrementing = false;
    protected $keyType = 'string';

    // Konstanta untuk nilai ENUM status
    public const STATUS_PENDING = 'pending';
    public const STATUS_ONGOING = 'ongoing';
    public const STATUS_COMPLETED = 'completed';

    protected $fillable = [
        'user_id',
        'vehicle_id',
        'pickup_location_id',
        'return_location_id',
        'pickup_date',
        'return_date',
        'status',
    ];

    // Relasi ke model User
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Relasi ke model Vehicle
    public function vehicle()
    {
        return $this->belongsTo(Vehicle::class);
    }

    // Relasi ke model Location untuk pickup location
    public function pickupLocation()
    {
        return $this->belongsTo(Location::class, 'pickup_location_id');
    }

    // Relasi ke model Location untuk return location
    public function returnLocation()
    {
        return $this->belongsTo(Location::class, 'return_location_id');
    }
}
