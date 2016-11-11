<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\PhoneBook\Contact\Contact;

use App\Http\Requests;

class ApiController extends Controller
{

    protected $contact;
    
    public function __construct(Contact $contact)
    {
        
        $this->contact = $contact;
    }

    public function index()
    {

        $contacts   = $this->contact->index();
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

        $this->contact->store($request);
        $data       = $request->all();
        $contacts   = $this->contact->index($data);
        return  response()->json($contacts);
    }

    public function show($contactId)
    {
        $contacts   = $this->contact->show($contactId);
        return response()->json($contacts);
    }

    public function edit($contactId)
    {
        $contacts   = $this->contact->show($contactId);
        return response()->json($contacts);
    }

    public function update(Request $request, $contactId)
    {

        $this->validate($request, [

        'name'     =>   'bail|required',
        'phone'    =>   'required|min:10|numeric',
        'notes'    =>   'max:255',
         ]);

        $data       = $request->all();
        $this->contact->update($data, $contactId);
        $contacts   = $this->contact->index();
        return response()->json($contacts);
    }

    public function destroy($contactId)
    {

        $this->contact->delete($contactId);
        $contacts   = $this->contact->index();
        return $contacts;
    }
}
