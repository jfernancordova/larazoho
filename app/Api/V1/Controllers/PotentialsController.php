<?php

namespace App\Api\V1\Controllers;
use App\Api\V1\Requests\Potentials\StoreRequest;
use App\Helpers\ApiResponse;
use App\Api\V1\Requests\Potentials\UpdateRequest;
use App\Http\Controllers\Controller;
use App\Potential;
use App\Services\ZohoCRM\ZohoManager;
use App\Transformers\PotentialTransformer;

class PotentialsController extends Controller
{
	/**
	 * @var potentialTransformer
	 */
	protected $potentialTransformer;
	
	/**
	 * @var zohoManager
	 */
	protected $zohoManager;
	

	public function __construct(PotentialTransformer $potentialTransformer){
		$this->potentialTransformer = $potentialTransformer;
		$this->zohoManager = new ZohoManager('Potentials');
	}
	
	/**
	 * @return \Illuminate\Http\JsonResponse
	 */
	public function index(){
		$potentials = Potential::all();
		return ApiResponse::response(200,'OK', $potentials);
	}
	
	/**
	 * @param $potential
	 * @return \Illuminate\Http\JsonResponse
	 */
	public function show($potential){
		$potential = Potential::findOrFail($potential);
		return ApiResponse::response(200,'Ok', $this->potentialTransformer->transform($potential));
	}
	
	/**
	 * Store a newly created resource in storage.
	 *account
	 * @param  StoreRequest  $request
	 * @return \Illuminate\Http\JsonResponse
	 */
	public function store(StoreRequest $request){
		$resource_data = $request->only([
			'potentialOwner', 'amount', 'potentialName', 'closingDate',
			'accountId','accountName', 'stage', 'type','probability',
			'createdBy', 'modifiedBy', 'contactId', 'contactName',
			'expectedRevenue', 'salesCycleDuration','wfTrigger','overallSalesDuration'
		]);
		$potential = new Potential();
		$potential->fill($resource_data);
		$response = $this->zohoManager->insertRecords($potential->transformRecordsToZoho());
		return ApiResponse::response(200, 'Ok', $response[1]->id);
	}
	
	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @param  UpdateRequest  $request
	 * @return \Illuminate\Http\JsonResponse
	 */
	public function update(UpdateRequest $request, $id){
		$potential = Potential::findOrFail($id);
		$resource_data = $request->only([
			'id','potentialOwner', 'amount', 'potentialName', 'closingDate',
			'accountId','accountName', 'stage', 'type','probability',
			'createdBy', 'modifiedBy', 'contactId', 'contactName',
			'expectedRevenue', 'salesCycleDuration','wfTrigger','overallSalesDuration'
		]);
		$potential->fill($resource_data);
		$this->zohoManager->updateRecords($id, $potential->transformRecordsToZoho());
		return ApiResponse::response(200, 'Ok', null);
	}
	
	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\JsonResponse
	 */
	public function destroy($id){
		$this->zohoManager->deleteRecords($id);
		Potential::where('id', '=', $id)->delete();
		return ApiResponse::response(200, 'OK', null);
	}
	
}
