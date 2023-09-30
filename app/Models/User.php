<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Fortify\TwoFactorAuthenticatable;
use Laravel\Jetstream\HasProfilePhoto;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable implements MustVerifyEmail
{
    use HasApiTokens, HasFactory, HasProfilePhoto, Notifiable, TwoFactorAuthenticatable;
    protected $fillable = [
        'name',
        'username',
        'email',
        'password',
        'role'
    ];
    protected $guarded = [
        'verified',
        'created'
    ];
    protected $hidden = [
        'password',
        'remember_token',
        'two_factor_recovery_codes',
        'two_factor_secret',
    ];
    protected $casts = [
        'name' => 'string',
        'username' => 'string',
        'password' => 'hashed',
        'role' => 'string',
        'verified' => 'boolean',
        'created' => 'string'
    ];
    protected $appends = [
        'profile_photo_url'
    ];
    public $timestamps = false;
}