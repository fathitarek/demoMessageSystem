<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MessagesRequest extends FormRequest
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
               'from_id'=>'required',
               'to_id' => 'required',
               'content'=>'required'
           ];
       }
       public function messages() {
           return [
               'from_id.required' => 'from_id is required',
               'to_id.required'=>'to_id is required',
               'content.required'=>'content is required'
           ];
       }
}
