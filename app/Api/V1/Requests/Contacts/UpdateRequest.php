<?php

namespace App\Api\V1\Requests\Contacts;
use Dingo\Api\Http\FormRequest;
class UpdateRequest extends FormRequest
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
    public function rules(){
        $contact_id = $this->route('contact');
	    $rules = [
		    'contactOwner'      => 'required',
		    'leadSource'        => 'sometimes|max:255',
		    'firstName'         => 'sometimes',
		    'lastName'          => 'sometimes',
		    'email'             => 'sometimes|email|max:255|unique:contacts',$contact_id,
		    'phone'             => 'sometimes',
		    'createdBy'         => 'sometimes',
		    'modifiedBy'        => 'sometimes',
		    'createdTime'       => 'sometimes',
		    'modifiedTime'      => 'sometimes',
		    'fullName'          => 'sometimes',
		    'mailingCountry'    => 'sometimes',
		    'mobile'            => 'sometimes'
	    ];
        return $rules;
    }
}
