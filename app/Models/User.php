<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'first_name',
        'last_name',
        'email',
        'image',
        'phone_number',
        'postal_code',
        'region',
        'locality',
        'password',
        'role'
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
        'password' => 'hashed',
    ];

    public function social()
    {
        return $this->hasOne(Social::class);
    }

    public function works()
    {
        return $this->hasMany(Work::class);
    }

    public function about()
    {
        return $this->hasOne(About::class);
    }

    public function skills()
    {
        return $this->hasMany(Skill::class);
    }

    public function work_histories()
    {
        return $this->hasMany(WorkHistory::class);
    }
}
