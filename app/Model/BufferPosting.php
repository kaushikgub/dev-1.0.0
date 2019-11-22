<?php

namespace Bulkly\Model;

use Illuminate\Database\Eloquent\Model;

class BufferPosting extends Model
{
    protected $guarded = [];
    protected $table = 'buffer_postings';

    public function user(){
        return $this->hasOne(User::class, 'id', 'user_id');
    }

    public function group(){
        return $this->hasOne(Group::class, 'id', 'group_id');
    }

    public function post(){
        return $this->hasOne(Post::class, 'id', 'post_id');
    }
}
