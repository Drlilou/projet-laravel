<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
class News extends Model
{


    use Notifiable;
    protected  $table='news';
    protected $fillable = [
        'id',
        'titre',
        'image',
        'description',
        'id_zone',
    ];


}

