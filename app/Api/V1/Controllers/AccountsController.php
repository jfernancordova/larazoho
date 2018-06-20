<?php

namespace App\Api\V1\Controllers;
use App\Account;
use App\Api\V1\Requests\Accounts\StoreRequest;
use App\Helpers\ApiResponse;
use App\Api\V1\Requests\Accounts\UpdateRequest;
use App\Http\Controllers\Controller;
use App\Services\ZohoCRM\ZohoManager;
use App\Transformers\AccountTransformer;

class AccountsController extends Controller
{
	/**
	 * @var accountTransformer
	 */
	protected $accountTransformer;
	
	/**
	 * @var zohoManager
	 */
	protected $zohoManager;
	

	public function __construct(AccountTransformer $accountTransformer){
		$this->accountTransformer = $accountTransformer;
		$this->zohoManager = new ZohoManager('Accounts');
	}
	
	/**
	 * @return \Illuminate\Http\JsonResponse
	 */
	public function index(){
		$accounts = Account::all();
		return ApiResponse::response(200,'OK', $accounts);
	}
	
	/**
	 * @param $account
	 * @return \Illuminate\Http\JsonResponse
	 */
	public function show($account){
		$account = Account::findOrFail($account);
		return ApiResponse::response(200,'Ok', $this->accountTransformer->transform($account));
	}
	
	/**
	 * Store a newly created resource in storage.
	 *account
	 * @param  StoreRequest  $request
	 * @return \Illuminate\Http\JsonResponse
	 */
	public function store(StoreRequest $request){
		$resource_data = $request->only([
			'accountOwner', 'accountName', 'phone', 'accountNumber',
			'accountType', 'ownerShip', 'industry', 'employees', 'annualRevenue', 'sicCode',
			'createdBy', 'modifiedBy', 'billingStreet', 'billingCity', 'billingState',
			'billingCountry'
		]);
		$account = new Account();
		$account->fill($resource_data);
		$response = $this->zohoManager->insertRecords($account->transformRecordsToZoho());
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
		$account = Account::findOrFail($id);
		$resource_data = $request->only([
			'id', 'accountOwner', 'accountName', 'phone', 'accountNumber',
			'accountType', 'ownerShip', 'industry', 'employees', 'annualRevenue', 'sicCode',
			'createdBy', 'modifiedBy', 'billingStreet', 'billingCity', 'billingState',
			'billingCountry'
		]);
		$account->fill($resource_data);
		$this->zohoManager->updateRecords($id, $account->transformRecordsToZoho());
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
		Account::where('id', '=', $id)->delete();
		return ApiResponse::response(200, 'OK', null);
	}
	
}
