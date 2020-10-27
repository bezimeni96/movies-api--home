<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateMovieRequest extends FormRequest
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
            "title" => "required|string",
            "director" => "required|string",
            "imageUrl" => "url",
            "duration" => "required|integer|min:1|max:500",
            "releaseDate" => "required|date_format:Y-m-d",
            "genre" => "string|in:" . implode(',', ['sci-fy', 'documentary', 'action', 'drama'])
        ];
    }
}
