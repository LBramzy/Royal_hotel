<?php

namespace App\Http\Requests;

// use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;

class AddRoom extends FormRequest
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
     * @return array<string, ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'room_name'=>'required|string|max:255',
            'room_number'=>'required|integer|min:1|max:500',
            'room_price'=>'required|integer|min:1|max:1000000000',
            'room_number_of_beds'=>'required|integer|min:1|max:20',

            'room_images'=>'required|array',
            'room_images.*'=>'required|image|mimes:png,jpeg,jpg,gif|min:100|max:3048',

            // Room Features
            'wifi'=>'nullable|in:1,0',
            'air_conditioning'=>'nullable|in:1,0',
            'smart_tv'=>'nullable|in:1,0',
            'complementary_breakfast'=>'nullable|in:1,0',
            'daily_housekeeping'=>'nullable|in:1,0',
            'work_desk'=>'nullable|in:1,0',
            'room_service'=>'nullable|in:1,0',
            'pool_access'=>'nullable|in:1,0',
        ];
    }

     public function messages(){
        return [
            // 'room_name.required'=>'Room name cannot be empty'
        ];
    }

    protected function failedValidation(Validator $validator){
        throw new

        HttpResponseException(response()->json([
            'status'=>'error',
            'errors'=>$validator->errors()
        ], 422));
    }
}
