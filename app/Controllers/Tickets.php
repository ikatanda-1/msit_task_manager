<?php

namespace App\Controllers;

class Tickets extends BaseController
{
    public function index(): string
    {
        return view('view_tickets');
    }

    public function create(): string 
    {
        return view('create_ticket');
    }
    public function edit()
    {
       
       return view('edit_ticket');
    }
    public function save($id){
        return view('save_ticket');
    }
    public function delete(){
        return view("delete_ticket");
    }
}
