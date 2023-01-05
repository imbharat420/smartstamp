<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreQrRequest extends FormRequest
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
            'name' => ['required', 'string', 'max:255','min:3'],
            'description' => ['required', 'string', 'max:255','min:50'],
            'url' => ['required', 'string', 'max:255'],
            'qr_code' => ['required', 'string', 'max:500'],
            'image' => ['required', 'file'],
            'location' => ['required', 'string', 'max:255'],
        ];
    }
}
