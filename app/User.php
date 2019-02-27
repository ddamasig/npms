<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    protected $appends = ['full_name'];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'username', 'first_name', 'middle_name', 'last_name', 'email', 'password',
    ];
    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    // Accessor
    function getFullNameAttribute() {
        return $this->first_name . ' ' . $this->middle_name[0] . '. ' . $this->last_name;
    }

    function getIsAdminAttribute() {
        if(UserType::where(['user_id' => $this->id, 'type' => 'admin'])->exists())
            return true;
        return false;
    }

    // Relationships
    public function UserTypes() {
        return $this->hasMany('UserType');
    }
}
