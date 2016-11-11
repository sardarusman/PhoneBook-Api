<?php

namespace App\PhoneBook\Contact;

use App\PhoneBook\Contracts\ContactInterface;
use Illuminate\Http\Request;
use Auth;
use App\Http\Requests;
use App\PhoneBook\Contacts;
use App\Library\User\Users;

class Contact implements ContactInterface
{

    protected $contacts;
    protected $helper;
    
    public function __construct(Contacts $contacts, Users $user)
    {
        $this->user = $user;
        $this->contacts = $contacts;
        $this->uid = $this->user->getUserId();
    }

    public function store($data)
    {
        $userId  = $this->uid;
        $data = array_merge($data->all(), array("user_id"=>$userId));

        return $this->contacts->create($data);
    }

    public function index()
    {

        return $this->contacts->Where('user_id', $this->uid)->get();
    }

    public function update($data, $contactId)
    {
        $userId  = $this->uid;

        $contacts = $this->contacts->where('id', $contactId)->Where('user_id', $userId);

        return $contacts->update($data);
    }

    public function delete($contactId)
    {
        $userId  = $this->uid;

        return $this->contacts->where('id', $contactId)->Where('user_id', $userId)->delete();
    }

    public function show($contactId)
    {
        $userId  = $this->uid;

        return $this->contacts->Where('id', $contactId)->Where('user_id', $userId)->get();
    }
}
