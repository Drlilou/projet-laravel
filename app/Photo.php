<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Photo extends Model
{
    use Notifiable;
    protected  $table='photos';
    protected $fillable = [
        'id',
        'img',
        'news',
    ];


}
