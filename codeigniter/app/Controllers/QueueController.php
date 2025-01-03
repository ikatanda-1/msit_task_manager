<?php

namespace App\Controllers;

use App\Models\TicketTypesModel;


class QueueController extends BaseController{
    public function index(){
       

        return view('queue.php');

    }

    public function add_new(){
        return view('add_queue');
    }

    public function getListOfTicketTypes(){

        $types = new TicketTypesModel;
        $typeNames = $types->getTypeNames();
        return $typeNames['type_desc'];

    }
}