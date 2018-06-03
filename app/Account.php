<?php

namespace App;

use App\Services\ZohoCRM\ZohoKeysModules;

class Account extends ZohoModel
{
	protected $zoho_keys = ZohoKeysModules::ACCOUNTS;
	
	protected $fillable = [
		'id', 'accountOwner', 'accountName', 'phone', 'accountNumber',
		'accountType', 'ownerShip', 'industry', 'employees', 'annualRevenue', 'sicCode',
		'createdBy', 'modifiedBy', 'billingStreet', 'billingCity', 'billingState',
		'billingCountry'
	];
}
