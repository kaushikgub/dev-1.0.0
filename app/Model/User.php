<?php

namespace Bulkly\Model;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    protected $guarded = [];
    protected $table = 'users';

    public function groups(){
        return $this->hasMany(Group::class, 'user_id', 'id');
    }
}
