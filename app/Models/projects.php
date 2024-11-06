<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class projects extends Model
{
    //use HasFactory;
    protected $fillable = [
            'id',
            'tags_id',
            'subject_id',
            'environment_id',
            'resources_id',
            'mechanism_id',
            'title',
            'logo',
            'abstract',
            'overview',
            'image',
            'link',
            'launchd',
            'proponent',
            'progress',
            'problems',
            'solution',
            'completion',
            'output',
            'costing',
            'future',
    ];
}
