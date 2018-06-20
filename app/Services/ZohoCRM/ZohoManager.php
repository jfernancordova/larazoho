<?php
namespace App\Services\ZohoCRM;
use CristianPontes\ZohoCRMClient\ZohoCRMClient;
use Carbon\Carbon;

class ZohoManager
{
    private $zohoClient;

    /**
     * ZohoSetter constructor.
     * @param string $module
     */
    public function __construct(string $module) {
        $this->zohoClient = new ZohoCRMClient($module, config('zoho.token'));
    }
    
	/**
	 * @param int $start
	 * @param int $end
	 * @param int $days
	 * @return \CristianPontes\ZohoCRMClient\Request\Field[]|\CristianPontes\ZohoCRMClient\Response\Record[]
	 * @throws \CristianPontes\ZohoCRMClient\Exception\UnexpectedValueException
	 */
	public function getRecordsByIndex(int $start, int $end, int $days = 100){
        return $this->zohoClient
	        ->getRecords()
	        ->fromIndex($start)
	        ->toIndex($end)
	        ->since((new Carbon())->subDay($days))
	        ->request();
    }

    /**
     * @return \CristianPontes\ZohoCRMClient\Request\Field[]|\CristianPontes\ZohoCRMClient\Response\Record[]
     * @throws \CristianPontes\ZohoCRMClient\Exception\UnexpectedValueException
     */
    public function getRecords(){
        return $this->zohoClient->getRecords()->request();
    }

    /**
     * @param string $id
     * @return \CristianPontes\ZohoCRMClient\Request\Field[]|\CristianPontes\ZohoCRMClient\Response\Record[]
     * @throws \CristianPontes\ZohoCRMClient\Exception\UnexpectedValueException
     */
    public function getRecordsById(string $id){
        return $this->zohoClient->getRecordById()->id($id)->request();
    }

    /**
     * @param $module
     * @param $fields
     * @return \CristianPontes\ZohoCRMClient\Response\MutationResult[]
     */
    public function insertRecords(array $fields) {
        return $this->zohoClient->insertRecords()
            ->addRecord($fields)
            ->triggerWorkflow()
            ->request();
    }

    /**
     * @param string $id
     * @param array $fields
     * @return \CristianPontes\ZohoCRMClient\Response\MutationResult[]
     */
    public function updateRecords(string $id, array $fields){
        $fields['Id'] = $id;
        return $this->zohoClient->updateRecords()
            ->addRecord($fields)
            ->triggerWorkflow()
            ->request();
    }

    /**
     * @param string $id
     * @return \CristianPontes\ZohoCRMClient\Response\MutationResult
     */
    public function deleteRecords(string $id){
        return $this->zohoClient
	        ->deleteRecords()
	        ->id($id)
            ->request();
    }

}