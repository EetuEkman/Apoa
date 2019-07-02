<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * Represents an assessment by the teacher for the classes.
 * @package App
 */
class Assessment extends Model
{
    protected $fillable = ['title', 'question', 'firstName', 'lastName'];

    public function author()
    {
        return $this->belongsTo(User::class);
    }

    public function groups()
    {
        return $this->hasMany(Group::class);
    }

    public function responses()
    {
        return $this->hasMany(Response::class);
    }
}
