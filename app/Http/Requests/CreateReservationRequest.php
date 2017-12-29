<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateReservationRequest extends FormRequest
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
            "people" => "required|numeric|min:1",
            "date" => "required|date",
            "time" => "required|date_format:H:i",
            "extraInfo" => "nullable|string|max:500",
            "restaurant_id" => "required|exists:restaurants,id"
        ];
    }
}
