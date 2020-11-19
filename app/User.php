<?php

namespace InnovaTec;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id','nombre','usuario', 'email', 'password', 'apellidos', 'ruc', 'razon_social', 'idtipo', 'registro', 'estado', 'telefono', 'direccion',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function newNotification () {
      $this->notify(new Notification);
    }
}
