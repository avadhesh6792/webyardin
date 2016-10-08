<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Group extends Model
{
    protected $table = 'chat_names';
    
    public function user()
    {
        return $this->belongsTo('App\AppUser', 'user_id', 'id');
    }
    
    public function groupMedia()
    {
        return $this->hasMany('App\GroupMedia', 'group_id', 'id');
    }
}
