<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Client extends Authenticatable
{
    use HasFactory;

    protected $fillable = [
        'name',
        'country_id',
        'city_id',
        'street',
        'email',
        'phone_number','password','phone',
        'mangment',
        'post',
        'code',
        'nighberhooad',
        'manager',
        'address,','sector_type'
    ];

    public function country(){
        return $this->belongsTo(Country::class);
    }
    public function city(){
        return $this->belongsTo(City::class);
    }
}
