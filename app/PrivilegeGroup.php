<?php

namespace App;
use Illuminate\Database\Eloquent\Model;

class PrivilegeGroup extends Model
{
    // protected $appends = ['privilege_items'];
    // Relationships
    public function privilege_items() {
        return $this->hasMany('App\PrivilegeItem');
    }
}
