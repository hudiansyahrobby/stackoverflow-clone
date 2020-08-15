<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Answer extends Model
{
    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = true;

    /**
     * Get the user that owns the answer.
     */
    public function user()
    {
        return $this->belongsTo('App\User');
    }

     /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['content', 'user_id', 'question_id'];

    /**
     * Get the comments for the answer post.
     */
    public function comments()
    {
        return $this->hasMany('App\Comment');
    }

    /**
     * Get the votes for the question post.
     */
    public function votes()
    {
        return $this->hasMany('App\Vote');
    }
}
