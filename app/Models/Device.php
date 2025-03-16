<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Device extends Model
{
    protected $table = 'devices';
    protected $keyType = 'string';
    protected $fillable = [
        'name',
        'price',
        'description',
        'additional_price',
        'additional_price_description',
        'image',
        'status',
        'joysticks_amount'
    ];

    public function getPriceAttribute($value) {
        return number_format($value, 0, ',', '.');
    }

    public function getAdditionalPriceAttribute($value) {
        return number_format($value, 0, ',', '.');
    }

    public function transactions()
    {
        return $this->hasMany(Transaction::class);
    }

}
