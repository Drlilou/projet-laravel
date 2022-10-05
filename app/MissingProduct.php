<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class MissingProduct extends Model
{
    use Notifiable;
    protected  $table='missing_products';
    protected $fillable = [
        'id',
        'news',
        'products',
        'Quantity'

    ];
}
