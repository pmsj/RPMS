<?php

namespace App\Models\Backend;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Designation extends Model
{
    use HasFactory;

    protected $fillable = ['designation_name', 'designation_abbreviation'];


    //--------------------------------appointments-------------------------------

    public function users()
    {
        return $this->belongsToMany('App\Models\User', 'user_appointments')
        ->withPivot('community_id','ministry','institution_parish_office', 'start_date', 'end_date', 'comment','created_at', 'updated_at');
    }

    public function communities()
    {
        return $this->belongsToMany('App\Models\Backend\Community', 'user_appointments')
        ->withPivot('user_id','institution_parish_office', 'start_date', 'end_date', 'comment','created_at', 'updated_at');
    }

}

 
