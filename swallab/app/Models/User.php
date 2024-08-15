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
        'name',
        'email',
        'bio',
        'password',
        'role',
        'avatar',
        'phone',
        'instagram',
        'facebook',
        'threads',
        'credit_card_1',
        'credit_card_2',
        'credit_card_3',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function getAvatarUrlAttribute()
    {

        // return $this->avatar ? url('storage/avatars/' . $this->avatar) : asset('images/default-avatar.jpg');
        return $this->avatar ? ('http://localhost/swallabLa/swallab/storage/app/public/' . $this->avatar) : asset('images/default-avatar.jpg');
    }

    public function hasThreeCreditCards()
    {
        return !is_null($this->credit_card_1) &&
            !is_null($this->credit_card_2) &&
            !is_null($this->credit_card_3);
    }

    public function getCreditCards()
    {
        return array_filter([
            $this->credit_card_1,
            $this->credit_card_2,
            $this->credit_card_3,
        ]);
    }

    public function addCreditCard($creditCardData)
    {
        if (is_null($this->credit_card_1)) {
            $this->credit_card_1 = $creditCardData;
        } elseif (is_null($this->credit_card_2)) {
            $this->credit_card_2 = $creditCardData;
        } elseif (is_null($this->credit_card_3)) {
            $this->credit_card_3 = $creditCardData;
        } else {
            throw new \Exception('最多只能儲存三張信用卡');
        }

        $this->save();
    }
}
