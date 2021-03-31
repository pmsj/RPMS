<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    // use HasFactory;

    protected $fillable = ['event_name','event_description'];

    //-----------------------Event Transaction
     public function users()
    {
        return $this->belongsToMany('App\Models\User', 'event_transactions')
        ->withPivot('held_on', 'presided_over_by', 'community_id', 'place', 'created_at', 'updated_at')
        ->OrderBy('first_name');
    }


    public function communities()
    {
        return $this->belongsToMany('App\Models\Backend\Community', 'event_transactions')
        ->withPivot('held_on', 'presided_over_by', 'user_id', 'place', 'created_at', 'updated_at')
        ->orderBy('id');
    }
}
