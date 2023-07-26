<?php

namespace App\Http\Requests\API\V1\User;

use Illuminate\Database\Query\Builder;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'name' => 'required|max:255',
            'username' => [
                'required',
                'max:255',
                Rule::unique('users')->ignore($this->username, 'username'),
            ],
            'email' => [
                'required',
                'max:255',
                'email',
                Rule::unique('users')->ignore($this->email, 'email'),
            ],
            'email_verified_at' => 'nullable|date',
            'password' => 'required|confirmed|max:255',
            'remember_token' => 'nullable|max:100',
            'is_active' => 'required|boolean',
            'roles' => [
                'array',
                Rule::exists('roles', 'id')->where(function (Builder $query) {
                    return $query->whereNull('deleted_at');
                }),
            ]
        ];
    }
}
