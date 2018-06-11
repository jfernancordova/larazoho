<?php

namespace App\Api\V1\Requests\Potentials;
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
		    'potentialOwner'        => 'required',
		    'amount'                => 'sometimes|max:255',
		    'potentialName'         => 'sometimes',
		    'closingDate'           => 'sometimes',
		    'accountId'             => 'sometimes',
		    'accountName'           => 'sometimes',
		    'stage'                 => 'sometimes',
		    'type'                  => 'sometimes',
		    'probability'           => 'sometimes',
		    'contactId'             => 'sometimes',
		    'createdBy'             => 'sometimes',
		    'modifiedBy'            => 'sometimes',
		    'contactName'           => 'sometimes',
		    'expectedRevenue'       => 'sometimes',
		    'salesCycleDuration'    => 'sometimes',
		    'overallSalesDuration'  => 'sometimes',
	    ];
        return $rules;
    }
}
