<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Task;

class Module extends Model
{
    protected $with = ['developers', 'tasks'];

    protected $fillable = [
        'name',
        'description',
        'project_id',
        'progress',
    ];

    // Relationships
    public function tasks() {
        return $this->hasMany('App\Task');
    }

    public function developers() {
        return $this->hasManyThrough(
            'App\User',
            'App\Task',
            'module_id',
            'id',
            'id',
            'developer_id'
        )->distinct('id');
    }
}
