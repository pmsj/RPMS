<?php

namespace App\Models\Backend;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Community extends Model
{
    // use HasFactory;

    //Table Name
    protected $table = 'community'; 

    //Fillable property
    protected $fillable = [
        'community_name',
        'mobile_number_community',
        'mobile_number_authority',
        'addressline',
        'pincode',
        'village_town_colony',
        'district_id',
        'state_id',
        'country_id',
    ];

    //relationship one-one
    public function country()
    {
        return $this->belongsTo(Country::class);
    }

    public  function district()
    {
        return $this->belongsTo(District::class);
    }

    public function state()
    {
        return $this->belongsTo(State::class);
    }

    //formation Transaction  relationship
    public function formationTransaction()
    {
        return $this->hasMany('App\Models\Backend\FormationTransaction');
    }

    //------------------------Formation Stage Transaction-----------------------
    public function users()
    {
        return $this->belongsToMany('App\Models\User', 'formation_transactions')
        ->withPivot('start_date', 'end_date', 'concerned_authority', 'formation_stage_id', 'created_at', 'updated_at')
        ->OrderBy('first_name');
    }


    public function formationStages()
    {
        return $this->belongsToMany('App\Models\Backend\Formation_stage', 'formation_transactions')
        ->withPivot('start_date', 'end_date', 'concerned_authority', 'user_id', 'created_at', 'updated_at')
        ->orderBy('id');
    }

    //------------------------Event  Transaction-----------------------


    public function userEvents()
    {
        return $this->belongsToMany('App\Models\User', 'event_transactions')
        ->withPivot('held_on', 'presided_over_by', 'event_id', 'place', 'created_at', 'updated_at')
        ->OrderBy('first_name');
    }


    public function events()
    {
        return $this->belongsToMany('App\Models\Event', 'event_transactions')
        ->withPivot('held_on', 'presided_over_by', 'user_id', 'place', 'created_at', 'updated_at')
        ->orderBy('id');
    }

    //--------------------------------appointments-------------------------------

    public function userAppointments()
    {
        return $this->belongsToMany('App\Models\User', 'user_appointments')
        ->withPivot('ministry', 'designation_id','institution_parish_office', 'start_date', 'end_date', 'comment', 'created_at', 'updated_at');
    }

    public function designations()
    {
        return $this->belongsToMany('App\Models\Backend\Designation', 'user_appointments')
        ->withPivot('user_id', 'ministry', 'institution_parish_office', 'start_date', 'end_date', 'comment', 'created_at', 'updated_at');
    }
}
