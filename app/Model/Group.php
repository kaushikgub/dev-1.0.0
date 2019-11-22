<?php

namespace Bulkly\Model;

use Illuminate\Database\Eloquent\Model;

class Group extends Model
{
    protected $guarded = [];
    protected $table = 'social_post_groups';

    public function posts(){
        return $this->hasMany(Group::class, 'id', 'group_id');
    }

//    public function user(){
//        return $this->hasOne(User::class, 'id', 'user_id');
//    }

}
