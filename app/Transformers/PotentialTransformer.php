<?php

namespace App\Transformers;
class PotentialTransformer extends Transformer
{
    /**
     * @param $potential
     * @return array
     */
    public function schema($potential){
        return [
	        'id'                    => $potential['id'],
	        'potentialOwner'        => $potential['potentialOwner'],
	        'amount'                => $potential['amount'],
	        'potentialName'         => $potential['potentialName'],
	        'closingDate'           => $potential['closingDate'],
	        'accountId'             => $potential['accountId'],
	        'accountName'           => $potential['accountName'],
	        'stage'                 => $potential['stage'],
	        'type'                  => $potential['type'],
	        'probability'           => $potential['probability'],
	        'contactId'             => $potential['contactId'],
	        'createdBy'             => $potential['createdBy'],
	        'modifiedBy'            => $potential['modifiedBy'],
	        'contactName'           => $potential['contactName'],
	        'expectedRevenue'       => $potential['expectedRevenue'],
	        'salesCycleDuration'    => $potential['salesCycleDuration'],
	        'overallSalesDuration'  => $potential['overallSalesDuration'],
        ];
    }
}