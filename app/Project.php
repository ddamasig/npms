<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use User;

class Project extends Model
{
    protected $fillable = [
        'name',
        'manager_id',
        'contact_id',
        'client',
        'description',
        'progress',
        'start_date',
        'end_date',
    ];

    // Relationships
    public function manager() {
        return $this->belongsTo('App\User', 'manager_id', 'id');
    }

    public function contact() {
        return $this->belongsTo('App\User', 'contact_id', 'id');
    }

    public function modules() {
        return $this->hasMany('App\Module');
    }
}
