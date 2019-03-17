<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    // Fillables
    protected $fillable = [
        'name',
        'description',
        'module_id',
        'developer_id',
    ];
    // Include relationships with queries
    protected $with = ['developer'];
    // Relationship
    public function developer() {
        return $this->belongsTo('App\User', 'developer_id', 'id');
    }
}
