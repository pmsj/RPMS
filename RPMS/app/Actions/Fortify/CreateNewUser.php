<?php

namespace App\Actions\Fortify;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Laravel\Fortify\Contracts\CreatesNewUsers;
use Laravel\Jetstream\Jetstream;

class CreateNewUser implements CreatesNewUsers
{
    use PasswordValidationRules;

    /**
     * Validate and create a newly registered user.
     *
     * @param  array  $input
     * @return \App\Models\User
     */
    public function create(array $input)
    {   
        Validator::make($input, [
            'first_name' => ['required', 'string', 'max:255'],
            'middle_name' => ['nullable', 'string', 'max:255'],
            'sur_name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => $this->passwordRules(),
            'birth_date' => ['nullable', 'date'],
            'entry_date_sj' => ['nullable', 'date'],
            'mobile_number1' => ['nullable', 'string', 'max:15'],
            'mobile_number2' => ['nullable', 'string', 'max:15'],
            'terms' => Jetstream::hasTermsAndPrivacyPolicyFeature() ? ['required', 'accepted'] : '',
        ])->validate();

        return User::create([
            'first_name' => $input['first_name'],
            'middle_name' => $input['middle_name'],
            'sur_name' => $input['sur_name'],
            'email' => $input['email'],
            'password' => Hash::make($input['password']),
            'birth_date' => $input['birth_date'],
            'entry_date_sj' => $input['entry_date_sj'],
            'mobile_number1' => $input['mobile_number1'],
            'mobile_number2' => $input['mobile_number2']

        ]);
    }
}
