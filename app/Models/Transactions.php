<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transactions extends Model
{
    use HasFactory;

    protected $fillable = [
        'reference',
        'description',
        'service_id',
        'user_id',
        'amount',
        'balance_before',
        'balance_after',
        'status',
    ];

    /**
     * Define a relationship with the Service model
     */
    public function service()
    {
        return $this->belongsTo(Service::class);
    }
}
