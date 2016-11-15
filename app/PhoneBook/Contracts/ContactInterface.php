<?php

namespace App\PhoneBook\Contracts;

interface ContactInterface
{

    public function store($data, $userId);
    public function index($userId);
    public function update($data, $contactId, $userId);
    public function delete($contactId, $userId);
    public function show($contactId, $userId);
}
