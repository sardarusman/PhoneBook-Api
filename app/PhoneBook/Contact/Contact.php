<?php

namespace App\PhoneBook\Contact;

use App\PhoneBook\Contracts\ContactInterface;
use Auth;
use App\PhoneBook\Contacts;

class Contact implements ContactInterface
{

    protected $contacts;
    protected $helper;
    
    public function __construct(Contacts $contacts)
    {
        $this->contacts = $contacts;
    }

    public function store($data, $userId)
    {
        $data = array_merge($data->all(), array("user_id"=>$userId));

        return $this->contacts->create($data);
    }

    public function index($userId)
    {
        return $this->contacts->Where('user_id', $userId)->get();
    }

    public function update($data, $contactId, $userId)
    {

        $contacts = $this->contacts->where('id', $contactId)->Where('user_id', $userId);

        return $contacts->update($data);
    }

    public function delete($contactId, $userId)
    {

        return $this->contacts->where('id', $contactId)->Where('user_id', $userId)->delete();
    }

    public function show($contactId, $userId)
    {

        return $this->contacts->Where('id', $contactId)->Where('user_id', $userId)->get();
    }
}
