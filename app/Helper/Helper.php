<?php

namespace App\Helper;

use Illuminate\Http\Request;

class Helper
{
    protected $request;

    public function __construct(Request $request)
    {

        $this->request = $request;
    }

    public function hasHeader()
    {
        if ($this->request->header('api_token')) {
            return true;
        } else {
            return false;
        }
    }

    public function hasHeaderKey()
    {
        if ($this->request->header('api_token')) {
             return true;
        } else {
            return false;
        }
    }

    public function getHeaderKey()
    {
        return $this->request->header('api_token');
    }
}
