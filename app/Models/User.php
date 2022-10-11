<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Symfony\Component\HttpKernel\Profiler\Profile;
use Cog\Laravel\Love\Liker\Models\Traits\Liker;


use Cog\Contracts\Love\Liker\Models\Liker as LikerContract;


class User extends Authenticatable 
{
    use HasApiTokens, HasFactory, Notifiable, Notifiable;
   

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'apellido',
        'N_identificacion',
        'email',
        'date',
        'celular',
        'username',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    public function setPasswordAttribute($password) {

        $this->attributes['password'] = bcrypt($password);
    }

    public function roles(){
        return $this->belongsToMany('App\Models\Role');
    }

     /* One-to-one relationship */
    public function profiles(){
        return $this->hasOne('App\Models\Profile');
        /* return $this->hasOne(Profile::class); */
    }
    public function productos(){
        return $this->hasMany('App\Models\Producto');
    }
    public function comments(){
        return $this->hasMany('App\Models\Comment');
    }
   
    public function image(){
        return $this->morphOne('App\Models\Image','imageable');
    }

    public function posteos(){
        return $this->hasMany('App\Models\Posteo');
    }
    public function bicicletas(){
        return $this->hasMany('App\Models\Bicicleta');
    }

   
}
