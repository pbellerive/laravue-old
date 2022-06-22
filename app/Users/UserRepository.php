<?php

namespace App\Users;

use Illuminate\Support\Facades\Validator;


class UserRepository
{
    public function update($user, $params)
    {
         Validator::make($params, [
            'first_name' => 'sometimes|required',
            'last_name' => 'sometimes|required',
            'email' => [
                'sometimes',
                'required',
                'email:rfc',
                 \Illuminate\Validation\Rule::unique('users')->ignore($user->id),
                 'max:512'
            ],
            'password' => 'confirmed'
        ])->validate();


        $user->fill($params)->save();
    }
}