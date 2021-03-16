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

    public function users()
    {
        return $this->hasMany('App\Models\User');
    }
    public function formationStage()
    {
        return $this->belongsTo('App\Models\Formation_stage');
    }
}
