<?php

namespace App\Http\Controllers;

use App\PhoneBook\Contact\Contact;
use Illuminate\Http\Request;

class ApiController extends Controller
{

    protected $contact;
    protected $request;
    
    public function __construct(Contact $contact, Request $request)
    {
        
        $this->contact = $contact;
        $this->request = $request;
    }

    public function index()
    {
        $userId     = $this->request->getUserId();
        $contacts   = $this->contact->index($userId);
        return $contacts;
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {

        $this->validate($request, [

        'name'     =>   'bail|required',
        'phone'    =>   'required|min:10|numeric',
        'notes'    =>   'max:255',
         ]);

        $userId     = $this->request->getUserId();
        $this->contact->store($request, $userId);
        $contacts   = $this->contact->index($userId);

        return  response()->json($contacts);
    }

    public function show($contactId)
    {
        $userId     = $this->request->getUserId();
        $contacts   = $this->contact->show($contactId, $userId);
        return response()->json($contacts);
    }

    public function edit($contactId)
    {
        $userId     = $this->request->getUserId();
        $contacts   = $this->contact->show($contactId, $userId);
        return response()->json($contacts);
    }

    public function update(Request $request, $contactId)
    {

        $this->validate($request, [

        'name'     =>   'bail|required',
        'phone'    =>   'required|min:10|numeric',
        'notes'    =>   'max:255',
         ]);

        $userId     = $this->request->getUserId();
        $data       = $request->all();
        $this->contact->update($data, $contactId, $userId);
        $contacts   = $this->contact->index($userId);
        return response()->json($contacts);
    }

    public function destroy($contactId)
    {
        $userId     = $this->request->getUserId();
        $this->contact->delete($contactId, $userId);
        $contacts   = $this->contact->index($userId);
        return $contacts;
    }
}
