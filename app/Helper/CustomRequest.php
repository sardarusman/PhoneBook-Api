<?php

namespace App\Helper;

class CustomRequest extends \Illuminate\Http\Request
{
    protected $userID;

    public function setUserId($userID)
    {
        $this->userID = $userID;
    }
    public function getUserId()
    {
        return $this->userID;
    }
}
