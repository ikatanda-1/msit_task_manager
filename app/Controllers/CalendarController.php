<?php

namespace App\Controllers;

use App\Models\EventModel;

class CalendarController extends BaseController
{
    public function index()
    {
        return view('calendar');
    }

    public function fetchEvents()
    {
        $eventModel = new EventModel();
        $start = $this->request->getGet('start');
        $end = $this->request->getGet('end');
        $events = $eventModel->getEvents($start, $end);

        return $this->response->setJSON($events);
    }

    public function addEvent()
    {
        $eventModel = new EventModel();
        $data = [
            'title' => $this->request->getPost('title'),
            'description' => $this->request->getPost('description'),
            'start_date' => $this->request->getPost('start_date'),
            'end_date' => $this->request->getPost('end_date'),
        ];

        $eventModel->insert($data);
        return $this->response->setJSON(['status' => 'success']);
    }
}
