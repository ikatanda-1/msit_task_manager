<?php

namespace App\Controllers;

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
 
 
    public function tickets(){
        return view("tickets");
    }
    public function login(){
        return view('login');
    }
    public function register(){
        return view('register');
    }
    public function registration_success(){
        return view('registration_success');
    }
    public function clients(){
        return view('client_list');
    }
    public function time(){
        return view('time');
    }

    public function log_in_first(){
        return view('log_in_first');
    }
    public function new_user(){
        return view('new_user');
    }
   public function four_o_four(){
    return view('404');
   }
   public function documentation(){
    return view('documentation');
   }


   public function about_project(){
    return view('about_project');
   }
   public function contact(){
    return view('contact');
   }

}
