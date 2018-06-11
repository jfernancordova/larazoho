<?php
namespace App\Services\ZohoCRM;
class ZohoKeysModules  {
	
	public const CONTACT = [
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
		'mailingZip'    => 'Mailing Zip'
	];
	
	public const LEADS = [
		'id'            => 'LEADID',
		'leadOwner'     => 'Lead Owner',
		'company'       => 'Company',
		'firstName'     => 'First Name',
		'lastName'      => 'Last Name',
		'designation'   => 'Designation',
		'email'         => 'Email',
		'phone'         => 'Phone',
		'mobile'        => 'Mobile',
		'website'       => 'Website',
		'leadSource'    => 'Lead Source',
		'leadStatus'    => 'Lead Status',
		'industry'      => 'Industry',
		'noOfEmployee'  => 'No of Employees',
		'annualRevenue' =>  'Annual Revenue',
		'createdBy'     => 'Created By',
		'modifiedBy'    => 'Modified By',
		'fullName'      => 'Full Name',
		'street'        => 'Street',
		'city'          => 'City',
		'state'         => 'State',
		'zipCode'       => 'Zip Code',
		'country'       => 'Country',
		'skypeId'       => 'Skype ID',
		'emailOpt'      => 'Email Opt Out',
		'salutation'    => 'Salutation'
	];
	
	public const ACCOUNTS = [
		'id'            => 'ACCOUNTID',
        'accountOwner'  => 'Account Owner',
        'accountName'   => 'Account Name',
        'phone'         => 'Phone',
        'accountNumber' => 'Account Number',
        'accountType'   => 'Account Type',
        'ownerShip'     => 'Ownership',
        'industry'      => 'Industry',
        'employees'     => 'Employees',
        'annualRevenue' => 'Annual Revenue',
        'sicCode'       => 'SIC Code',
        'createdBy'     => 'Created By',
        'modifiedBy'    => 'Modified By',
        'billingStreet' => 'Billing Street',
        'billingCity'   => 'Billing City',
        'billingState'  => 'Billing State',
        'billingCountry' => 'Billing Country',
	];
	
	public const POTENTIALS = [
		'id'                    => 'POTENTIALID',
        'potentialOwner'        => 'Potential Owner',
        'amount'                => 'Amount',
        'potentialName'         => 'Potential Name',
        'closingDate'           => 'Closing Date',
        'accountId'             => 'ACCOUNTID',
        'accountName'           => 'Account Name',
        'stage'                 => 'Stage',
        'type'                  => 'Type',
        'probability'           => 'Probability',
		'createdBy'             => 'Created By',
		'modifiedBy'            => 'Modified By',
        'contactId'             => 'CONTACTID',
        'contactName'           => 'Contact Name',
        'expectedRevenue'       => 'Expected Revenue',
        'salesCycleDuration'    => 'Sales Cycle Duration',
        'overallSalesDuration'  => 'Overall Sales Duration'
	];
	
}