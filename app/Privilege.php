<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Privilege extends Model
{
    // Fillable
    protected $fillable = ['user_id', 'privilege_item_id'];

    // Appends
    protected $appends = [''];

    // Relationships
    public function user() {
        return $this->belongsTo('User');
    }

    public function privilege_item() {
        return $this->belongsTo('PrivilegeItem');
    }
}
