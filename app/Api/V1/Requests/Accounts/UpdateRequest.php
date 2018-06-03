<?php

namespace App\Api\V1\Requests\Accounts;
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
		    'accountOwner'      => 'required',
		    'accountName'       => 'sometimes|max:255',
		    'accountNumber'     => 'sometimes',
		    'accountType'       => 'sometimes',
		    'phone'             => 'sometimes',
		    'ownerShip'         => 'sometimes',
		    'industry'          => 'sometimes',
		    'employees'         => 'sometimes',
		    'annualRevenue'     => 'sometimes',
		    'sicCode'           => 'sometimes',
		    'createdBy'         => 'sometimes',
		    'modifiedBy'        => 'sometimes',
		    'billingStreet'     => 'sometimes',
		    'billingCity'       => 'sometimes',
		    'billingState'      => 'sometimes',
		    'billingCountry'    => 'sometimes'
	    ];
        return $rules;
    }
}
