<?php

namespace App\PhoneBook\Contracts;

interface ContactInterface
{

    public function store($data);
    public function index();
    public function update($data, $contactId);
    public function delete($contactId);
    public function show($contactId);
}
