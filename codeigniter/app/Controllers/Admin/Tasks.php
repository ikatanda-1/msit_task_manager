<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;

class Tasks extends BaseController
{
    public function index(): string
    {
        return view('landing_page');
    }

    public function dash(): string 
    {
        return view('dashboard');
    }
    public function profile($id)
    {
       echo $id." is the profile you accessed";
       #return view('profile');
    }
}
