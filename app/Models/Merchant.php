<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Merchant extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = [
        'email',
        'password',
    ];

    protected $hidden = [
        'password',
    ];

    protected function casts(): array
    {
        return [
            'password' => 'hashed',
        ];
    }

    public function profile()
    {
        return $this->hasOne(MerchantProfile::class, 'merchant_id');
    }

    public function account()
    {
        return $this->hasMany(MerchantAccount::class, 'merchant_id');
    }

    public function menu()
    {
        return $this->hasMany(Menu::class, 'merchant_id');
    }
}
