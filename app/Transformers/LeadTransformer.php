<?php

namespace App\Transformers;
class LeadTransformer extends Transformer
{
    /**
     * @param $lead
     * @return array
     */
    public function schema($lead){
        return [
        	'id'                    => $lead['id'],
	        'leadOwner'             => $lead['leadOwner'],
	        'company'               => $lead['company'],
	        'firstName'             => $lead['firstName'],
	        'lastName'              => $lead['lastName'],
	        'designation'           => $lead['designation'],
	        'email'                 => $lead['email'],
	        'phone'                 => $lead['phone'],
	        'mobile'                => $lead['mobile'],
	        'website'               => $lead['website'],
	        'leadSource'            => $lead['leadSource'],
	        'leadStatus'            => $lead['leadStatus'],
	        'industry'              => $lead['industry'],
	        'noOfEmployee'          => $lead['noOfEmployee'],
	        'createdBy'             => $lead['createdBy'],
	        'modifiedBy'            => $lead['modifiedBy'],
	        'fullName'              => $lead['fullName'],
	        'street'                => $lead['street'],
	        'city'                  => $lead['city'],
	        'state'                 => $lead['state'],
	        'zipCode'               => $lead['zipCode'],
	        'country'               => $lead['country'],
	        'skypeId'               => $lead['skypeId'],
	        'emailOpt'              => $lead['emailOpt'],
	        'salutation'            => $lead['salutation'],
        ];
    }
}