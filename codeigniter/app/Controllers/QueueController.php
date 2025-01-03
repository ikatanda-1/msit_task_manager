<?php

namespace App\Controllers;


class QueueController extends BaseController{
    public function index(){
        return view('queue.php');

    }

    public function add_new(){
        return view('add_queue');
    }
}