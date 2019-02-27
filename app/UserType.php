<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserType extends Model
{
    // Fillable
    protected $fillable = ['user_id', 'type'];

    // Relationships
    public function user() {
        return $this->belongsTo('User');
    }
}
