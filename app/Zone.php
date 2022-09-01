<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;

class Zone extends Model
{

    use Notifiable;
    protected  $table='zones';
    protected $fillable = [
        'id',
        'nom',
        'admin',
    ];


}
