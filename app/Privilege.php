<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Privilege extends Model
{
    // Fillable
    protected $fillable = ['user_id', 'type'];

    // Relationships
    public function user() {
        return $this->belongsTo('User');
    }
}
