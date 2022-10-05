<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{

    use Notifiable;
    protected  $table='product';
    protected $fillable = [
        'id',
        'category',
        'name',
        'measruing_unit',
    ];

}
