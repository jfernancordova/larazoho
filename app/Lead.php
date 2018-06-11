<?php

namespace App;

use App\Services\ZohoCRM\ZohoKeysModules;

class Lead extends ZohoModel
{
	protected $zoho_keys = ZohoKeysModules::LEADS;
	
	protected $fillable = [
		'id', 'leadOwner', 'company', 'firstName', 'lastName',
		'designation','email', 'phone', 'mobile','website',
		'leadSource', 'leadStatus', 'industry', 'noOfEmployee',
		'annualRevenue', 'createdBy','modifiedBy','fullName',
		'street','city','state','zipCode','country','skypeId',
		'emailOpt','salutation'
	];
}
