<?php

namespace App\Actions\Fortify;
use Illuminate\Support\Facades\DB;
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
     * @param  array<string, string>  $input
     */
    public function create(array $input): User
    {
        Validator::make($input, [
            'name' => ['required', 'string', 'max:255','regex:/^[A-Za-z0-9\s]+$/'],
            'email' => ['required', 'max:255', 'email', 'regex:/^[A-Za-z0-9._%+-]+@(gmail)\.com$/i', 'unique:users'],
            'status' => ['required'],
            'region' => ['required'],
            'password' => $this->passwordRules(),
            'terms' => Jetstream::hasTermsAndPrivacyPolicyFeature() ? ['accepted', 'required'] : '',
        ])->validate();


        $user= User::create([
            'name' => $input['name'],
            'email' => $input['email'],
            'password' => Hash::make($input['password']),
            'region'=>$input['region'] ,
            'status'=>$input['status'],
            'degree'=>$input['status'] == "teacher"? $input['degree'] : null,
            'diplomaField'=>$input['status'] == "teacher"? $input['diplomaField'] : null,
        ]);

        if ($input['status'] === 'student') {
            $badge = './badges/student.png';
        } elseif ($input['status'] === 'teacher') {
            $badge = './badges/teacher.png';
        } else {
            $badge = null;
        }

        if ($badge !== null) {
            DB::table('badges')->insert([
                'badge' => $badge,
                'user_id' =>$user->id,
                'description' => $input['status'],
            ]);
        }

        return $user;        


    }
}
