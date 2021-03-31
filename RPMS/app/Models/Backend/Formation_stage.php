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
        return $this->belongsToMany('App\Models\User', 'formation_transactions')
        ->withPivot('start_date', 'end_date', 'concerned_authority', 'community_id', 'created_at', 'updated_at')
        ->OrderBy('first_name');
    }


    public function communities()
    {
        return $this->belongsToMany('App\Models\Backend\Community', 'formation_transactions')
        ->withPivot('start_date', 'end_date', 'concerned_authority', 'user_id', 'created_at', 'updated_at')
        ->orderBy('id');
    }
}
