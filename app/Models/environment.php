<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class environment extends Model
{
    protected $primaryKey = "environment_id";

    public $incrementing = true;

    protected $fillable = [
        "nature",
        "industry",
        "government"
    ];
}
