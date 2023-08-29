<?php

namespace Src\Item\Food\Requests;
use Illuminate\Foundation\Http\FormRequest;

class PostFoodRequests extends FormRequest
{

    public function authorize() :bool
    {
        return true;
    }


    public function rules() :array
    {
        return [
            'name' => 'required|string',
            'description' => 'required|string',
            'address' => 'required|string',
            'availabilities' => 'required|boolean',
            'booked' => 'required|boolean',
            'score_cost' => 'required|string',
            'DateExpiry' => 'required|date',
            'image_path' => 'required|array|min:1|max:4',
            'image_path.*' => 'image|mimes:jpeg,png,jpg',
        ];
    }
}
