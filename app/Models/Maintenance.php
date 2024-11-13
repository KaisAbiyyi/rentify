<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Maintenance extends Model
{
    use HasFactory, HasUuids;

    public $incrementing = false;
    protected $keyType = 'string';

    protected $fillable = [
        'vehicle_id',
        'maintenance_date',
        'type',
        'description',
        'cost',
    ];

    // Relasi ke model Vehicle
    public function vehicle()
    {
        return $this->belongsTo(Vehicle::class);
    }
}
