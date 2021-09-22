<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class Problem extends Model
{
    use HasFactory, SoftDeletes;

    public $fillable = ['problem', 'resolved'];

    public function project()
    {
        return $this->belongsTo(Project::class);
    }

}
