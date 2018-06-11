<?php
namespace App\Services\ZohoCRM;
use App\Account;
use App\Contact;
use App\Lead;
use App\Potential;

class ZohoSync
{
    private $zohoManager;
    private $model;

    protected $serviceModels = [
        'Contacts'    => Contact::class,
	    'Accounts'    => Account::class,
	    'Potentials'  => Potential::class,
	    'Leads'       => Lead::class
    ];

    /**
     * ZohoSync constructor.
     * @param $service
     */
    public function __construct($service) {
        $this->zohoManager  = new ZohoManager($service);
        $this->model        = new $this->serviceModels[$service];
    }

    /**
     * @param int $start
     * @param int $end
     * @throws \CristianPontes\ZohoCRMClient\Exception\UnexpectedValueException
     */
    public function sync(int $start, int $end){
	    $recordIndex = 0;
        do {
            $records = $this->zohoManager->getRecordsByIndex($start, $end);
            $this->processRecords($records);
	        $recordIndex ++;
        } while (empty($records) && $recordIndex < count($records));
    }

    /**
     * @param array $records
     */
    private function processRecords(array $records){
        foreach ($records as $key => $record) {
	        $record = $this->model->transformRecordsFromZoho($record);
            $this->updateOrInsertRecordsOnDB($record);
        }
    }

    /**
     * @param array $record
     */
    private function updateOrInsertRecordsOnDB(array $record) {
        $search = $this->model->where('id', $record['id'])->first();
        if(!empty($search)) {
            $search->update($record);
        }
        else{
	        $this->model->create($record);
        }
    }

    /**
     * @param $id
     */
    public function delete($id){
        $this->model->where('id', $id)->delete();
    }
    
}