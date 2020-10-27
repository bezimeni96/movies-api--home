<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateMovieRequest extends FormRequest
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
            "title" => "sometimes|required|string",
            "director" => "sometimes|required|string",
            "imageUrl" => "sometimes|url",
            "duration" => "sometimes|required|integer|min:1|max:500",
            "releaseDate" => "sometimes|required|date_format:Y-m-d",
            "genre" => "sometimes|string|in:" . implode(',', ['sci-fy', 'documentary', 'action', 'drama']),
        ];
    }
}
