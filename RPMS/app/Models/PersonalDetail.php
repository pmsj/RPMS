<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PersonalDetail extends Model
{
    use HasFactory;

    protected $fillable = ['father', 'mother', 'siblings','village_town_colony', 'parish','dioses', 'district_id', 'pincode','post_office', 'post_box_number','state_id', 'country_id',
    ];

    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }

    //relationship one-one
    public function country()
    {
        return $this->belongsTo('App\Models\Backend\Country');
    }

    public  function district()
    {
        return $this->belongsTo('App\Models\Backend\District');
    }

    public function state()
    {
        return $this->belongsTo('App\Models\Backend\State');
    }
}
