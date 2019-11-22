<?php

namespace Bulkly\Model;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $guarded = [];
    protected $table = 'social_posts';

//    public function group(){
//        return $this->hasOne(Group::class, 'id', 'group_id');
//    }
}
