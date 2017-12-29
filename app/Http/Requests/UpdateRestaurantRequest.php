<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateRestaurantRequest extends FormRequest
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
            "info" => "string|nullable|max:500",
            "tag0" => "required|string|max:50",
            "tag1" => "nullable|string|max:50",
            "tag2" => "nullable|string|max:50",
            "tag3" => "nullable|string|max:50",
            "tables" => "required|numeric|min:1|max:50",
            "openingTime" => "required|date_format:H:i",
            "closingTime" => "required|date_format:H:i",
            "city" => "required|string|max:100",
            "country" => "required|string|max:100",
            "street" => "required|string|max:100",
            "houseNumber" => "required|numeric",
//            "image" => "image"
        ];
    }
}
