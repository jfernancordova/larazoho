<?php

namespace App;

use App\Services\ZohoCRM\ZohoKeysModules;
class Contact extends ZohoModel
{
	protected $zoho_keys = ZohoKeysModules::CONTACT;
	
    protected $fillable = [
        'id', 'contactOwner', 'leadSource', 'firstName', 'lastName',
	    'email', 'title', 'phone', 'mobile', 'createdBy',
	    'modifiedBy', 'fullName', 'mailingStreet', 'mailingCity',
	    'mailingState', 'mailingZip','wfTrigger'
    ];
    
}
