<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AppUser extends Model
{
    protected $table = 'users';
    
    
    public function groups()
    {
        return $this->hasMany('App\Group', 'user_id', 'id');
    }
}
