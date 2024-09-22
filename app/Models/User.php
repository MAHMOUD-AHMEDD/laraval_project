<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\SoftDeletes;
class User extends Authenticatable
{



    use HasFactory, Notifiable;
    use softDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'username',
        'phone',
        'email',
        'password',
        'type'
    ];


    public function setPasswordAttribute($value)
    {
        $this->attributes['password'] = bcrypt($value);
    }
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
<<<<<<< HEAD
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */

//    protected function casts(): array
//    {
//        return [
//            'email_verified_at' => 'datetime',
//            'password' => 'hashed',
//        ];
//    }
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];


    public function questions()
    {
        return $this->hasMany(questions::class,'user_id');
    }

    public function image()
    {
        return $this->morphOne(Images::class,'imageable');
    }
    public function tickets()
    {
        return $this->hasMany(ticket::class,'user_id');
    }
}
