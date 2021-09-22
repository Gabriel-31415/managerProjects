<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class Annotation extends Model
{
    use HasFactory, SoftDeletes;

    public $fillable = ['annotation'];

    public function project()
    {
        return $this->belongsTo(Project::class);
    }
}
