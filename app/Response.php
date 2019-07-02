<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * Represents a student response to an assessment.
 * @package App
 */
class Response extends Model
{
    protected $fillable = ['grade', 'answer'];

    public function responseTo()
    {
        return $this->belongsTo(Assessment::class);
    }

    public function respondent()
    {
        return $this->belongsTo(User::class);
    }
}
