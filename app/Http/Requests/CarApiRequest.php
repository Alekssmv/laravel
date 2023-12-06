<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Validation\ValidationException;


class CarApiRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => 'required|string',
            'body_text' => 'required|string',
            'price' => 'required|integer',
            'old_price' => 'integer',
            'body_id' => 'required|integer|exists:car_bodies,id',
        ];
    }
    protected function failedValidation(Validator $validator): void
    {
        $response = response()->json([
            'success' => false,
            'errors' => $validator->errors(),
        ], 422);
        
        throw new ValidationException($validator, $response);
    }
}
