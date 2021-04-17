<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
// use Illuminate\Support\Facades\Hash;
use Laravel\Fortify\TwoFactorAuthenticatable;
use Laravel\Jetstream\HasProfilePhoto;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\SoftDeletes; //soft delete

class User extends Authenticatable // default
// class User extends Authenticatable implements MustVerifyEmail
{
    use HasApiTokens;
    use HasFactory;
    use HasProfilePhoto;
    use Notifiable;
    use TwoFactorAuthenticatable;
    use SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $dates = ['deleteda_at'];
    protected $fillable = [
        'first_name',
        'middle_name',
        'sur_name',
        'email',
        'password',
        'password_confirmation',
        'birth_date',
        'entry_date_sj',
        'mobile_number1',
        'mobile_number2'
    ];
    protected $nullable = [
        'sur_name',
        'birth_date',
        'entry_date_sj',
        'mobile_number1',
        'mobile_number2'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
        'two_factor_recovery_codes',
        'two_factor_secret',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * The accessors to append to the model's array form.
     *
     * @var array
     */
    protected $appends = [
        'profile_photo_url',
    ];

    //hashin passwrod before saving it to the data base
    // public function setPasswordAttribute($password)
    // {
    //     $this->attributes['password'] = Hash::make($password);
    // }

    //get age of user
    public function getAge()
    {
        $dateOfBirth = Auth::user()->birth_date;
        $years = Carbon::parse($dateOfBirth)->age;
        echo $years;
    }

    public function YearsAsJesuit()
    {
        $entryDateOfSj = Auth::user()->entry_date_sj;
        $yearsInSJ = Carbon::parse($entryDateOfSj)->age;
        echo $yearsInSJ;
    }

    //Role relationsip
    public function roles()
    {
        return $this->belongsToMany('App\Models\Role');
    }

    /**
     * Check if the user has a role
     * @param string $role
     * @return bool
     */
    public function hasAnyRole(string $role)
    {
        return null !== $this->roles()->where('role_name', $role)->first();
    }

    /**
     * Check if the user has any given role
     * @param array $role
     * @return bool
     */
    public function hasAnyRoles(array $role)
    {
        return null !== $this->roles()->whereIn('role_name', $role)->first();
    }

    //personal detail relationship
    public function personalDetail()
    {
        return $this->hasOne('App\Models\PersonalDetail');
    }

   //---------------------Formation Transaction-------------------------
    //user has many Formation Stages
    public function formationStages()
    {
        return $this->belongsToMany('App\Models\Backend\Formation_stage', 'formation_transactions')
                    ->withPivot('start_date', 'end_date', 'concerned_authority', 'community_id', 'created_at', 'updated_at')
                    ->orderBy('id');
    }

    public function communities()
    {
        return $this->belongsToMany('App\Models\Backend\Community', 'formation_transactions')
        ->withPivot('start_date', 'end_date', 'concerned_authority', 'formation_stage_id','created_at', 'updated_at')
        ->orderBy('id');
        
    }

    //---------------------Event Transaction------------------------------

    public function events()
    {
        return $this->belongsToMany('App\Models\Event', 'event_transactions')
        ->withPivot('held_on','presided_over_by','community_id', 'place', 'created_at', 'updated_at')
        ->orderBy('id');
    }

    public function communityEvents()
    {
        return $this->belongsToMany('App\Models\Backend\Community', 'formation_transactions')
        ->withPivot('held_on', 'presided_over_by', 'event_id', 'place', 'created_at', 'updated_at')
        ->orderBy('id');
    }

    //-----------------------Appointments--------------------------------------

    public function designations()
    {
        return $this->belongsToMany('App\Models\Backend\Designation', 'user_appointments',)
        ->withPivot('ministry', 'institution_parish_office','start_date', 'end_date', 'comment', 'community_id','created_at', 'updated_at')
        ->orderBy('start_date', 'Desc');
    }

    public function communityAppointements()
    {
        return $this->belongsToMany('App\Models\Backend\Community', 'user_appointments')
        ->withPivot('designation_id', 'ministry','institution_parish_office', 'start_date', 'end_date', 'comment', 'created_at', 'updated_at');
        
    }

}
