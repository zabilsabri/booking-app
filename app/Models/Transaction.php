<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    protected $table = 'transactions';
    protected $keyType = 'string';
    protected $fillable = [
        'device_id',
        'order_id',
        'user_id',
        'sessions',
        'total_price',
        'status',
        'snap_token',
        'book_date'
    ];

    protected function casts(): array
    {
        return [
            'book_date' => 'datetime',
        ];
    }

    public function device()
    {
        return $this->belongsTo(Device::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function getTotalPriceAttribute($value) {
        return number_format($value, 0, ',', '.');
    }

    public function getCreatedAtAttribute($value) {
        return \Carbon\Carbon::parse($value)->format('d F Y H:i');
    }

    public function getUpdatedAtAttribute($value) {
        return \Carbon\Carbon::parse($value)->format('d-m-Y H:i');
    }
}
