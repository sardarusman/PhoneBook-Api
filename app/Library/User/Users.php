<?php

namespace App\Library\User;

use App\Library\User\UserHandler;

use App\Helper\Helper;

class Users
{

    protected $helper;

    protected $userHandler;
    
    public function __construct(Helper $helper, UserHandler $userHandler)
    {
        $this->helper = $helper;

        $this->userHandler = $userHandler;
    }

    public function getUserId()
    {
        $userId = $this->userHandler->getUserId($this->helper->getHeaderKey());
        return $userId;
    }

    public function getUserToken()
    {
        return $this->helper->getHeaderKey();
    }
}
