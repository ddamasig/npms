<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    // Relationship
    public function developer() {
        return $this->belongsTo('App\User', 'developer_id', 'id');
    }
}
