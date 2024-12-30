<?php
namespace App\Controllers;

use App\Models\TimeModel;
use CodeIgniter\Exceptions\PageNotFoundException;

class TimeController extends BaseController
{
    public function index($userId)
    {
        $timeModel = new TimeModel(); // Instantiate the model
        
        // Get date filters from the request
        $startDate = $this->request->getGet('start_date');
        $endDate = $this->request->getGet('end_date');

        // Fetch the data from the model
        $result = $timeModel->getTimeDataByUserId($userId, $startDate, $endDate);

        // Check if results exist
        if (empty($result)) {
            throw new PageNotFoundException("No records found for user ID: $userId");
        }

        // Return the view with the data
        return view('time', 
        ['timeData' => $result,
        'startDate' => $startDate,
        'endDate' => $endDate]
        );
    }
}
