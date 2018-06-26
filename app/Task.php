<?php

namespace App;

use Jenssegers\Mongodb\Eloquent\Model as Eloquent;

class Task extends Eloquent
{
     /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name'];
    
    /**
     * Get the user that owns the task.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
