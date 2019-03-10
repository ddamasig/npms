<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Module extends Model
{
    protected $attributes = [
        'progress' => 0,
    ];
    protected $fillable = [
        'name',
        'description',
        'project_id',
        'progress',
    ];
}
