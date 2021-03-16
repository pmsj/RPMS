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

class User extends Authenticatable // default
// class User extends Authenticatable implements MustVerifyEmail
{
    use HasApiTokens;
    use HasFactory;
    use HasProfilePhoto;
    use Notifiable;
    use TwoFactorAuthenticatable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
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

   
    //user has many Formation Stages
    public function formationStages()
    {
        return $this->belongsToMany('App\Models\Backend\Formation_stage', 'formation_transactions', 'user_id','formation_stage_id')
                    ->withPivot('concerned_authority', 'community_id', 'start_date', 'end_date', 'created_at', 'updated_at');
    }

    public function hasAnyFormationStages(array $formationStage)
    {
        return null !== $this->formationStages()->whereIn('stage_name', $formationStage)->first();
    }

    public function community()
    {
        return $this->belongsTo('App\Models\Backend\Community');
    }
}
