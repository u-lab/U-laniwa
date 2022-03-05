<?php

namespace App\Actions\Fortify;

use App\Models\User;
use App\Models\UserInviteCode;
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
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => $this->passwordRules(),
            'user_role_id' => ['required', 'integer', 'between:1,29', 'exists:user_roles,id'], //初回登録では最高でも仮入部権限までなので
            'invite_code' => ['exists:user_invite_codes,code'],
            'terms' => Jetstream::hasTermsAndPrivacyPolicyFeature() ? ['required', 'accepted'] : '',
        ])->validate();
        /** @var UserInviteCode */
        $user_invite_code = UserInviteCode::where('code', $input['invite_code'],)->first();
        return User::create([
            'name' => $input['name'],
            'email' => $input['email'],
            'password' => Hash::make($input['password']),
            'user_role_id' => $input['user_role_id'],
            'invited_id' => $user_invite_code->user_id,
        ]);
    }
}