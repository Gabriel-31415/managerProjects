<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = ['title','description','url','image','database','trello','github','status'];

    public function commands()
    {
        return $this->hasMany(Command::class);
    }

    public function annotations()
    {
        return $this->hasMany(Annotation::class);
    }

    public function tasks()
    {
        return $this->hasMany(Task::class);
    }
    public function problems()
    {
        return $this->hasMany(Problem::class);
    }

    public function websites()
    {
        return $this->hasMany(Website::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
