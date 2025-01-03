<?php

namespace App\Controllers;

use App\Models\ClientModel;
use App\Models\TicketsModel;

class CompanyController extends BaseController
{
    /* start: index() */

    public function index($clientId)
    {
        $this->profile($clientId);
        $ticketModel = new TicketsModel();
        $data = [
            
            'tickets' => $ticketModel->getCompanyTickets($clientId),
        ];

        return view('company_view', $data);
    }

/* ends index() */

    public function profile($clientId)
    {
        $model = new ClientModel();
        $company = $model->find($clientId);

        if (!$company) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Company not found');
        }

        return view('company_profile', ['company' => $company]);
    }


    public function getCoDetails($id)
    {
        $clientModel = new ClientModel(); // Instantiate the model

        // Fetch company details by ID
        $companyDetails = $clientModel->getCompanyDetailsById($id);

        if (empty($companyDetails)) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException("Company not found");
        }

        // Pass the data to the view
        $data['company'] = $companyDetails;
        return view('company_card', $data);
    }

    /* start: searchClient() */
    public function searchClients()
{
    $clientModel = new ClientModel();
    $searchTerm = $this->request->getGet('term');

    $clients = $clientModel
        ->select('id, reg_name')
        ->like('reg_name', $searchTerm)
        ->findAll();

    $result = [];
    foreach ($clients as $client) {
        $result[] = [
            'id' => $client->id,
            'label' => $client->reg_name,
            'value' => $client->reg_name,
            'url' => site_url('company/' . $client->id)
        ];
    }

    return $this->response->setJSON($result);
}

    /* ends searchClient() */
    public function create_ticket($client_id){
        $coDetails = $this->getCoDetails($client_id);
        $co_name = $coDetails['reg_name'];

        return view("add_ticket",[
            'client_id'=> $client_id,
            'reg_name' => $co_name
        ]);

    }
}
