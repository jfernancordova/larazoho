<?php

namespace App\Transformers;
class ContactTransformer extends Transformer
{
    /**
     * @param $contact
     * @return array
     */
    public function schema($contact){
        return [
            'id'              => $contact['id'],
            'contactOwner'    => $contact['contactOwner'],
            'leadSource'      => $contact['leadSource'],
            'firstName'       => $contact['firstName'],
            'lastName'        => $contact['lastName'],
            'title'           => $contact['title'],
            'mobile'          => $contact['mobile'],
            'email'           => $contact['email'],
            'phone'           => $contact['phone'],
            'createdBy'       => $contact['createdBy'],
            'modifiedBy'      => $contact['modifiedBy'],
            'createdTime'     => $contact['createdTime'],
            'modifiedTime'    => $contact['modifiedTime'],
            'fullName'        => $contact['fullName'],
            'mailingCountry'  => $contact['mailingCountry'],
        ];
    }
}