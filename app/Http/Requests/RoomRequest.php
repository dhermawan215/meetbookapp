<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RoomRequest extends FormRequest
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
            'nama_ruang' => 'required|max:255',
            'kapasitas' => 'required|max:255',
            'fasilitas' => 'required',
            'lokasi' => 'required|max:255'
        ];
    }
}
