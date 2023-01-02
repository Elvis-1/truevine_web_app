<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreUserRequest extends FormRequest
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
     'first_name'=>'required|alpha',
     'last_name'=>'required|alpha',
     'email'=>'required|unique:users',
    //  'password'=>'required|min:6',
     'phone'=>'required|numeric',
     'address'=>'required|',
     'image'=>'nullable|image|max:2000'
        ];
    }

    public function messages()
{
    return [
        'phone.numeric' => 'phone must be a number',
        'image.image'=>'file must be an image'
    ];
}
}
