<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TagsRequest extends FormRequest
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
            //
        ];
    }
    protected function prepareForValidation()
    {
        $tags = collect(explode(',', $this->input('tags')))
            ->map(fn ($tag) => preg_replace('/\W/u', '', $tag))
            ->filter(fn ($tag) => !empty($tag));


        $this->merge(['tags' => $tags->all()]);
    }
}
