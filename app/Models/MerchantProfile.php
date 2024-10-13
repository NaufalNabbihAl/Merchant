<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MerchantProfile extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = [
        'merchant_id',
        'name',
        'address',
        'province',
        'regency',
        'district',
        'village',
        'phone_number',
    ];

    public function merchant()
    {
        return $this->belongsTo(Merchant::class, 'merchant_id');
    }
}
