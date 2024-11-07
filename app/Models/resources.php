<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class resources extends Model
{
    protected $primaryKey = "resources_id";
    public $incrementing = true;

    protected $fillable = [

        "human",
        "financial",
        "technical"
    ];
}
