<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class mechanism extends Model
{
    protected $primaryKey = "mechanism_id";
    public $incrementing = true;

    protected $fillable = [
        "planning",
        "design",
        "installation",
        "testing",
        "monitoring"
    ];
}
