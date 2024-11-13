<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use HasFactory, HasUuids;

    public $incrementing = false;
    protected $keyType = 'string';

    // Konstanta untuk nilai ENUM status
    public const STATUS_PENDING = 'pending';
    public const STATUS_COMPLETED = 'completed';

    protected $fillable = [
        'rental_id',
        'amount',
        'payment_date',
        'status',
    ];

    // Relasi ke model Rental
    public function rental()
    {
        return $this->belongsTo(Rental::class);
    }
}
