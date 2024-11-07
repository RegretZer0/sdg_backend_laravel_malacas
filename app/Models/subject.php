<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class subject extends Model
{
    protected $primaryKey = "subject_id";

    public $incrementing = true;

    protected $fillable = [
        "initiator",
        "leader",
        "members"
    ];
}
