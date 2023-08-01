<?php

namespace App\Http\Requests\HRI;

use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            "code" => [
                "required",
                "string",
                $this->route()->keyword
                    ? "unique:keyword,code," . $this->route()->keyword
                    : "unique:keyword,code",
            ],
            "name" => ["required", "string", "required"],
        ];
    }
}
