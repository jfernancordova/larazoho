<?php

namespace App;
use CristianPontes\ZohoCRMClient\Response\Record;
use Illuminate\Database\Eloquent\Model;

abstract class ZohoModel extends Model
{
	
	protected $zoho_keys = [];
	
	/**
	 * @param Record $record
	 * @return array
	 */
	public function transformRecordsFromZoho(Record $record){
		$records = [];
		foreach ($this->zoho_keys as $modelRecords => $zohoKey){
			$records[$modelRecords] = $record->get($zohoKey);
		}
		return $records;
	}
	
	/**
	 * @return array
	 */
	public function transformRecordsToZoho(){
		$records = [];
		foreach ($this->zoho_keys as $modelRecords => $zohoKey){
			$records[$zohoKey] = isset($this->$modelRecords) ? $this->$modelRecords : '';
		}
		return $records;
	}
}
