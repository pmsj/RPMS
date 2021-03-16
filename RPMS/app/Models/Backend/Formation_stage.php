<?php

namespace App\Models\Backend;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Formation_stage extends Model
{
    // use HasFactory;

    // protected $table = 'formation_stages';

    //fillable property
    protected $fillable = ['stage_name','stage_description', 'stage_duration'];

    //Formation Stage has many  Users
    public function users()
    {
        return $this->belongsToMany('App\Models\User', 'formation_transactions', 'user_id','formation_stage_id',)
        ->withPivot('concerned_authority', 'community_id', 'start_date', 'end_date', 'created_at', 'updated_at');
    }

    public function community()
    {
        return $this->hasOne('App\Models\Backend\Community');
    }
}
