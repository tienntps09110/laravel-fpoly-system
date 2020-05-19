<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests,
    DispatchesJobs,
    ValidatesRequests;

    // VIEW NAME
    protected $viewLogin = 'login';
    
    
    // ROUTE NAME
    protected $routeHome = 'home';
    protected $routeLogin = 'login';
    protected $routeUsers = 'get-users';
    // KEY NAME
    protected $danger = 'danger';
}
