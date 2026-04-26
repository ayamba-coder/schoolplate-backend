<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DonationRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        $role = $this->role;
        $rules = [
            'amount' => ['required', 'numeric', 'min:500'],
            'payment_channel' => ['required', 'string'],
        ];
        if ($role == 'donor') {
            $rules = array_merge($rules, [
                'student_id' => ['required', 'exists:users,id'],
            ]);
        }
        if ($role == 'institution') {
            $rules = array_merge($rules, [
                'class_id' => ['required', 'exists:class,id']
            ]);
        }

        return $rules;

    }
}
