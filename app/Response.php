<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * Represents a student response to an assessment.
 * @package App
 */
class Response extends Model
{
    protected $fillable = ['grade', 'body'];

    public function assessment()
    {
        return $this->belongsTo(Assessment::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
