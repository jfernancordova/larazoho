<?php

namespace App\Api\V1\Controllers;
use App\Api\V1\Requests\Contacts\StoreRequest;
use App\Contact;
use App\Helpers\ApiResponse;
use App\Http\Controllers\Controller;
use App\Api\V1\Requests\Contacts\UpdateRequest;
use App\Services\ZohoCRM\ZohoManager;
use App\Transformers\ContactTransformer;

class ContactsController extends Controller
{
	/**
	 * @var contactTransformer
	 */
	protected $contactTransformer;
	
	/**
	 * @var zohoManager
	 */
	protected $zohoManager;
	
	/**
	 * ContactController constructor.
	 * @param ContactTransformer $contactTransformer
	 */
	public function __construct(ContactTransformer $contactTransformer){
		$this->contactTransformer = $contactTransformer;
		$this->zohoManager = new ZohoManager('Contacts');
	}
	
	/**
	 * @return \Illuminate\Http\JsonResponse
	 */
	public function index(){
		$contacts = Contact::all();
		return ApiResponse::response(200,'OK', $contacts);
	}
	
	/**
	 * @param $contact
	 * @return \Illuminate\Http\JsonResponse
	 */
	public function show($contact){
		$contact = Contact::findOrFail($contact);
		return ApiResponse::response(200,'Ok', $this->contactTransformer->transform($contact));
	}
	
	/**
	 * Store a newly created resource in storage.
	 *
	 * @param  StoreRequest  $request
	 * @return \Illuminate\Http\JsonResponse
	 */
	public function store(StoreRequest $request){
		$resource_data = $request->only([
			'contactOwner','leadSource','firstName','lastName','mobile','title','email','phone','createdBy',
			'modifiedBy','createdTime','modifiedTime','fullName','mailingCountry'
		]);
		$contact = new Contact();
		$contact->fill($resource_data);
		$response = $this->zohoManager->insertRecords($contact->transformRecordsToZoho());
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
		$contact = Contact::findOrFail($id);
		$resource_data = $request->only([
			'contactOwner','leadSource','firstName','lastName','mobile','title','email','phone','createdBy',
			'modifiedBy','createdTime','modifiedTime','fullName','mailingCountry'
		]);
		$contact->fill($resource_data);
		$this->zohoManager->updateRecords($id, $contact->transformRecordsToZoho());
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
		Contact::where('id', '=', $id)->delete();
		return ApiResponse::response(200, 'OK', null);
	}
	
}
