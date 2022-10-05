<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Don extends Model
{

    use Notifiable;
    protected  $table='dons';
    protected $fillable = [
        'id',
        'missing_products',
        'user',
        'phone',
        'Quantity'
    ];
}
