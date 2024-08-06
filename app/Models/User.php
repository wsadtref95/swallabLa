<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Storage;

class User extends Authenticatable
{
    use Notifiable;

    protected $fillable = [
        'name', 'email', 'bio', 'password', 'role', 'avatar', 'phone'
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function getAvatarUrlAttribute()
    {
        
        // return $this->avatar ? url('storage/avatars/' . $this->avatar) : asset('images/default-avatar.jpg');
        return $this->avatar ? ('http://localhost/swallabLa/swallab/storage/app/public/' . $this->avatar) : asset('images/default-avatar.jpg');
    }
}
