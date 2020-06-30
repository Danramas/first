<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreAlbumRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'album_name' => 'required|string|max:255',
            'user_id' => 'required|integer|exists:users,id'
        ];
    }
}
