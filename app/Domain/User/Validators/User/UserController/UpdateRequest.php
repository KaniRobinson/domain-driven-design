<?php

namespace App\Domain\User\Validators\User\UserController;

use Illuminate\Foundation\Http\FormRequest;

class UpdateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'first_name' => [
                'sometimes'
            ],

            'last_name' => [
                'sometimes'
            ],

            'email' => [
                'sometimes',
                'email',
                'unique:users,email,' . $this->id
            ],

            'password' => [
                'sometimes',
                'min:8',
                'regex:/^.*(?=.{3,})(?=.*[a-zA-Z])(?=.*[0-9])(?=.*[\d\X])(?=.*[!$#%]).*$/',
                'confirmed'
            ]
        ];
    }
}
