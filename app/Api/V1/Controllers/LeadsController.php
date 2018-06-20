<?php

namespace App\Api\V1\Controllers;
use App\Api\V1\Requests\Leads\StoreRequest;
use App\Helpers\ApiResponse;
use App\Api\V1\Requests\Leads\UpdateRequest;
use App\Http\Controllers\Controller;
use App\Lead;
use App\Services\ZohoCRM\ZohoManager;
use App\Transformers\LeadTransformer;

class LeadsController extends Controller
{
	/**
	 * @var leadTransformer
	 */
	protected $leadTransformer;
	
	/**
	 * @var zohoManager
	 */
	protected $zohoManager;
	

	public function __construct(LeadTransformer $leadTransformer){
		$this->leadTransformer = $leadTransformer;
		$this->zohoManager = new ZohoManager('Leads');
	}
	
	/**
	 * @return \Illuminate\Http\JsonResponse
	 */
	public function index(){
		$leads = Lead::all();
		return ApiResponse::response(200,'OK', $leads);
	}
	
	/**
	 * @param $lead
	 * @return \Illuminate\Http\JsonResponse
	 */
	public function show($lead){
		$lead = Lead::findOrFail($lead);
		return ApiResponse::response(200,'Ok', $this->leadTransformer->transform($lead));
	}
	
	/**
	 * Store a newly created resource in storage.
	 *account
	 * @param  StoreRequest  $request
	 * @return \Illuminate\Http\JsonResponse
	 */
	public function store(StoreRequest $request){
		$resource_data = $request->only([
			'leadOwner', 'company', 'firstName', 'lastName',
			'designation','email', 'phone', 'mobile','website',
			'leadSource', 'leadStatus', 'industry', 'noOfEmployee',
			'annualRevenue', 'createdBy','modifiedBy','fullName',
			'street','city','state','zipCode','country','skypeId',
			'emailOpt','salutation'
		]);
		$lead = new Lead();
		$lead->fill($resource_data);
		$response = $this->zohoManager->insertRecords($lead->transformRecordsToZoho());

		$sync->sync(1,200);
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
		$lead = Lead::findOrFail($id);
		$resource_data = $request->only([
			'id','leadOwner', 'company', 'firstName', 'lastName',
			'designation','email', 'phone', 'mobile','website',
			'leadSource', 'leadStatus', 'industry', 'noOfEmployee',
			'annualRevenue', 'createdBy','modifiedBy','fullName',
			'street','city','state','zipCode','country','skypeId',
			'emailOpt','salutation'
		]);
		$lead->fill($resource_data);
		$this->zohoManager->updateRecords($id, $lead->transformRecordsToZoho());
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
		Lead::where('id', '=', $id)->delete();
		return ApiResponse::response(200, 'OK', null);
	}
	
}
