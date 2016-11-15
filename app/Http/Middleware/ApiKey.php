<?php

namespace App\Http\Middleware;

use Closure;
use App\Library\User\Users;
use App\Helper\Helper;
use App\Helper\CustomRequest;

class ApiKey
{

    protected $helper;
    protected $user;
    protected $custom;

    public function __construct(Helper $helper, Users $user)
    {
        $this->helper = $helper;
        $this->user = $user;
    }
    
    public function handle($request, Closure $next)
    {

        if (!$this->helper->hasHeader()) {
            return response('Unauthorized.Token Not Define', 401);
        }

        if (!$this->helper->hasHeaderKey()) {
            return response('Unauthorized.', 401);
        }

        $user = $this->user->getUserId();

        if ($user) {
            $request->setUserId($user);
            return $next($request);
        } else {
            return response('Unauthorized Token. ', 401);
        }
    }
}
