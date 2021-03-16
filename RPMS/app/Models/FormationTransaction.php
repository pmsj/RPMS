<?php

namespace App\Models;
use Illuminate\Support\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Backend\Formation_stage;

class FormationTransaction extends Model
{
    // use HasFactory;

    //user relationship
    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }

    public function getYear()
    {
        $batchYear = Formation_stage::pivot()->start_date;
        $date = Carbon::createFromFormat('m/d/Y', $batchYear)->format('Y');
        echo $date;
    }

}
