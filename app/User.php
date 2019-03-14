<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Privilege;

class User extends Authenticatable
{
    use Notifiable;

    protected $appends = ['full_name', 'initials'];

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

    public function getInitialsAttribute() {
        $initials = substr($this->first_name, 0, 1) .
            substr($this->middle_name, 0, 1) .
            substr($this->last_name, 0, 1);

        return $initials;
    }

    function getIsAdminAttribute() {
        if(Privilege::where(['user_id' => $this->id, 'privilege_item_id' => 'admin'])->exists())
            return true;
        return false;
    }

    function getIsContactPersonAttribute() {
        if(Privilege::where(['user_id' => $this->id, 'privilege_item_id' => 'contact_person'])->exists())
            return true;
        return false;
    }

    function getIsDeveloperAttribute() {
        if(Privilege::where(['user_id' => $this->id, 'privilege_item_id' => 'developer'])->exists())
            return true;
        return false;
    }

    function getIsProjectManagerAttribute() {
        if(Privilege::where(['user_id' => $this->id, 'privilege_item_id' => 'project_manager'])->exists())
            return true;
        return false;
    }

    // Relationships
    public function privileges() {
        return $this->hasMany('App\Privilege');
    }

    public function match_privileges($privileges) {
        $isAllowed = Privilege::leftJoin('privilege_items', 'privilege_items.id', '=', 'privilege_item_id')
            ->where('user_id', $this->id)->whereIn('privilege_items.name', $privileges)->first();
        if ($isAllowed)
            return true;
        return false;
    }
}
