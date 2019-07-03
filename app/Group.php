<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * Represents a college class.
 * @package App
 */
class Group extends Model
{
    protected $fillable = ['name', 'description', 'year', 'semester'];

    public function members()
    {
        return $this->belongsToMany(User::class);
    }

    public function assessments()
    {
        return $this->belongsToMany(Assessment::class);
    }
}
