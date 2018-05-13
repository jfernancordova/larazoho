<?php
namespace App\Zoho;
class ZohoSync
{
    private $zohoManager;
    private $token;
    private $model;

    private $serviceModels = [
        'Products'          => Products::class,
        'Contacts'          => Contact::class,
        'Vendors'           => Vendor::class,
    ];

    /**
     * ZohoSync constructor.
     * @param $service
     */
    public function __construct($service) {
        $this->zohoManager  = new ZohoManager($service);
        $this->token        = config('zoho.token');
        $this->model        = new $this->serviceModels[$service];
        $this->insertRecords  = [];
    }

    /**
     * @param int $start
     * @param int $end
     * @throws \CristianPontes\ZohoCRMClient\Exception\UnexpectedValueException
     */
    public function run(int $start, int $end){
        do {
            $records = $this->zohoManager->getRecordsByIndex($start, $end);
            $this->processRecords($records);
        } while (empty($records));
    }

    /**
     * @param array $records
     */
    private function processRecords(array $records){
        foreach ($records as $key => $record) {
            $this->updateOrInsertRecord($record);
        }
    }

    /**
     * @param $record
     */
    private function updateOrInsertRecord($record) {
        $search = $this->model->where('id', $record['id'])->first();
        if(!empty($search)) {
            $search->update($record);
        }
        $this->model->create($record);
    }

    /**
     * @param $id
     */
    public function delete($id){
        $this->model->where('id', $id)->delete();
    }

}