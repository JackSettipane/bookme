<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Chat extends Model
{
    use SoftDeletes;

    public  $fillable = ['sender_id','receiver_id','message','message_type'];

    protected $appends = ['message_user','date'];

    public function receiver(){
        return $this->hasOne('App\User','id','receiver_id');
    }

    public function sender(){
        return $this->hasOne('App\User','id','sender_id');
    }

    public function getMessageUserAttribute()
    {
        return ($this->sender_id == auth()->user()->id)?'sender':'receiver';
    }

    public function getDateAttribute()
    {
        return $this->created_at->toDayDateTimeString();
    }
}
