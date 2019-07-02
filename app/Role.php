<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * Represents a role of an user, e.g. a student or a teacher.
 * @package App
 */
class Role extends Model
{
    protected $fillable = ['name', 'description', 'secret'];

    public function users()
    {
        $this->hasMany(User::class);
    }
}
