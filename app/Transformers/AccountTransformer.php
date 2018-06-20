<?php

namespace App\Transformers;
class AccountTransformer extends Transformer
{
    /**
     * @param $account
     * @return array
     */
    public function schema($account){
        return [
        	'id'              => $account['id'],
            'accountOwner'    => $account['accountOwner'],
            'accountNumber'   => $account['accountNumber'],
            'accountType'     => $account['accountType'],
            'phone'           => $account['phone'],
            'ownerShip'       => $account['ownerShip'],
            'industry'        => $account['industry'],
            'employees'       => $account['employees'],
            'annualRevenue'   => $account['annualRevenue'],
            'sicCode'         => $account['sicCode'],
            'createdBy'       => $account['createdBy'],
            'modifiedBy'      => $account['modifiedBy'],
            'billingStreet'   => $account['billingStreet'],
	        'billingCity'     => $account['billingCity'],
	        'billingState'    => $account['billingState'],
	        'billingCountry'  => $account['billingCountry'],
        ];
    }
}