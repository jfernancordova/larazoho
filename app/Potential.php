<?php

namespace App;

use App\Services\ZohoCRM\ZohoKeysModules;

class Potential extends ZohoModel
{
	protected $zoho_keys = ZohoKeysModules::POTENTIALS;
	
	protected $fillable = [
		'id', 'potentialOwner', 'amount', 'potentialName', 'closingDate',
		'accountId','accountName', 'stage', 'type','probability',
		'createdBy', 'modifiedBy', 'contactId', 'contactName',
		'expectedRevenue', 'salesCycleDuration','wfTrigger','overallSalesDuration'
	];
}
