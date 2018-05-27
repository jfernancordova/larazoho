<?php

namespace App;

use CristianPontes\ZohoCRMClient\Response\Record;
use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
	public const ZOHO_KEYS = [
		'id'            => 'CONTACTID',
		'contactOwner'  => 'Contact Owner',
		'leadSource'    => 'Lead Source',
		'firstName'     => 'First Name',
		'lastName'      => 'Last Name',
		'email'         => 'Email',
		'phone'         => 'Phone',
		'mobile'        => 'Mobile',
		'title'         => 'Title',
		'createdBy'     => 'Created By',
		'modifiedBy'    => 'Modified By',
		'fullName'      => 'Full Name',
		'mailingStreet' => 'Mailing Street',
		'mailingCity'   => 'Mailing City',
		'mailingState'  => 'Mailing State',
		'mailingZip'    =>  'Mailing Zip'
	];
	
    protected $fillable = [
        'id', 'contactOwner', 'leadSource', 'firstName', 'lastName',
	    'email', 'title', 'phone', 'mobile', 'createdBy',
	    'modifiedBy', 'fullName', 'mailingStreet', 'mailingCity',
	    'mailingState', 'mailingZip','wfTrigger'
    ];
	
	/**
	 * @param Record $record
	 * @return array
	 */
	public function transformRecordsFromZoho(Record $record){
    	$records = [];
    	foreach (self::ZOHO_KEYS as $modelRecords => $zohoKey){
		    $records[$modelRecords] = $record->get($zohoKey);
	    }
	    return $records;
    }
	
	/**
	 * @return array
	 */
	public function transformRecordsToZoho(){
		$records = [];
		foreach (self::ZOHO_KEYS as $modelRecords => $zohoKey){
			$records[$zohoKey] = isset($this->$modelRecords) ? $this->$modelRecords : '';
		}
		return $records;
	}
    
}
