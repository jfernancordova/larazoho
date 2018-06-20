<?php

namespace App\Api\V1\Requests\Contacts;
use Dingo\Api\Http\FormRequest;

class StoreRequest extends FormRequest {
 
	/**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(){
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(){
        $rules = [
            'contactOwner'      => 'required',
            'leadSource'        => 'sometimes|max:255',
            'firstName'         => 'sometimes',
            'lastName'          => 'sometimes',
            'email'             => 'sometimes|email|max:255|unique:contacts',
            'phone'             => 'required',
            'createdBy'         => 'required',
            'modifiedBy'        => 'sometimes',
            'createdTime'       => 'sometimes',
            'modifiedTime'      => 'sometimes',
            'fullName'          => 'required',
            'mailingCountry'    => 'sometimes',
            'mobile'            => 'sometimes'
        ];
        return $rules;
    }
}
