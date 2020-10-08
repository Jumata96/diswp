<?php

namespace InnovaTec\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MessageFormRequest extends FormRequest
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
            'to'            => 'required|email|min:8',
            'subject'       => 'required|min:4|max:200',
            'message'       => 'required|min:2|max:10000'          

        ];
    }
}
