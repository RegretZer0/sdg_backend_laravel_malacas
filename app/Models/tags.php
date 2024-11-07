<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class tags extends Model
{
    protected $primaryKey = 'tags_id';
    public $incrementing = true;

    protected $fillable = [
        
        'tags_id',
        'name',
        'image'
    ];
}
