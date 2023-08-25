<?php

namespace Src\Item\Requests;
use Illuminate\Foundation\Http\FormRequest;

class PostObjectRequests extends FormRequest
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
            'condition' => 'required|string',
            'category_id' => ['required'
                ,'int'
                ,'exists:categories,id'],
            'image_path' => 'required|array|min:1|max:4',
            'image_path.*' => 'image|mimes:jpeg,png,jpg',
        ];
    }
}
