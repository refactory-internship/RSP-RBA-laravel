<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RoomAndPhotoStore extends FormRequest
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
        $formRequests = [
            \App\Http\Requests\Rooms\Store::class,
            \App\Http\Requests\PhotoRooms\Store::class
        ];
        $rules = [];
        foreach ($formRequests as $request) {
            $rules = array_merge($rules, (new $request)->rules());
        }
        return $rules;
    }
}
