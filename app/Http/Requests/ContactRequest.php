<?php

namespace App\Http\Requests;

use App\Rules\ReCaptcha;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Validation\ValidationException;

class ContactRequest extends FormRequest
{
    public function rules(): array
    {
        $rules = [
            'name'    => ['required', 'string', 'max:100'],
            'email'   => ['required', 'email', 'max:100'],
            'subject' => ['required', 'string', 'max:100'],
            'content' => ['required', 'string', 'max:1000'],
        ];

        if (app()->environment('production')) {
            $rules['g-recaptcha-response'] = ['required', new ReCaptcha('submitContact', 0.7)];
        }

        return $rules;
    }

    protected function failedValidation(Validator $validator)
    {
        $response = redirect('/#contact')
            ->withErrors($validator)
            ->withInput();

        throw new ValidationException($validator, $response);
    }
}
