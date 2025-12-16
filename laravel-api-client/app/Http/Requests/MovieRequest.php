<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MovieRequest extends FormRequest
{
    public function authorize()
    {
        return true; // vagy ellenőrizd a szerepkört: auth()->user()->hasRole('admin')
    }

    public function rules()
    {
        return [
            'title' => 'required|string|max:255',
            'director_id' => 'required|integer|exists:directors,id',
            'release_year' => 'nullable|integer',
            'description' => 'nullable|string',
        ];
    }
}
