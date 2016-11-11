<?php

namespace App\Library\User;

use \DB;

class UserHandler
{

    public function getUserId($apiKey)
    {
        $user_id = DB::table('users')->select('id')->where('api_token', $apiKey)->get();
        if ($user_id) {
            return $user_id[0]->id;
        } else {
            return false;
        }
    }
}
