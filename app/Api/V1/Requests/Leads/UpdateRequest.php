<?php

namespace App\Api\V1\Requests\Leads;
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
	    $rules = [
		    'leadOwner'             => 'required',
		    'company'               => 'sometimes|max:255',
		    'firstName'             => 'sometimes',
		    'lastName'              => 'sometimes',
		    'designation'           => 'sometimes',
		    'email'                 => 'sometimes',
		    'phone'                 => 'sometimes',
		    'mobile'                => 'sometimes',
		    'website'               => 'sometimes',
		    'leadSource'            => 'sometimes',
		    'leadStatus'            => 'sometimes',
		    'industry'              => 'sometimes',
		    'noOfEmployee'          => 'sometimes',
		    'createdBy'             => 'sometimes',
		    'modifiedBy'            => 'sometimes',
		    'fullName'              => 'sometimes',
		    'street'                => 'sometimes',
		    'city'                  => 'sometimes',
		    'state'                 => 'sometimes',
		    'zipCode'               => 'sometimes',
		    'country'               => 'sometimes',
		    'skypeId'               => 'sometimes',
		    'emailOpt'              => 'sometimes',
		    'salutation'            => 'sometimes',
	    ];
        return $rules;
    }
}
