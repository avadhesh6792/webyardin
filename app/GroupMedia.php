<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class GroupMedia extends Model
{
    protected $table = 'group_chat';
    protected $primaryKey = 'chat_id';
    
    public function group()
    {
        return $this->belongsTo('App\Group', 'group_id', 'id');
    }
}
