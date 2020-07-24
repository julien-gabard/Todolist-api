<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Task extends Model {
    protected $fillable = [
        'title',
        'completion',
        'status',
        'category_id' 
    ];
}