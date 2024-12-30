<?php

namespace App\Controllers;

use App\Models\ClientModel;
use CodeIgniter\Controller;
use App\Models\ClientTypeModel;


class Client extends Controller
{
    protected $clientModel;

    public function __construct()
    {
        // Instantiate the model
        $this->clientModel = new ClientModel();
    }

    /**
     * List all clients with sorting, pagination,
     * and limit (items per page) buttons.
     */
    public function index()
    {
        // 1. Collect query parameters for sorting and limit
        $sortBy = $this->request->getGet('sort_by') ?? 'reg_name'; // default sort column
        $order  = $this->request->getGet('order')   ?? 'ASC';      // default sort order
        $limit  = $this->request->getGet('limit')   ?? 15;         // default items per page

        // 2. Validate sorting columns
        $validColumns = ['reg_name', 'reg_no'];
        if (! in_array($sortBy, $validColumns)) {
            $sortBy = 'reg_name'; // fallback
        }

        // 3. Validate sort order (ASC|DESC)
        $order = (strtoupper($order) === 'DESC') ? 'DESC' : 'ASC';

        // 4. Set sorting in the model
        $this->clientModel->orderBy($sortBy, $order);

        // 5. Pagination Setup
        $clients = $this->clientModel->paginate($limit);
        $pager   = $this->clientModel->pager; // Access the built-in Pager instance

        // 6. Pass variables for the view
        $data['id']         = $this->clientModel->id;
        $data['clients']    = $clients;
        $data['pager']      = $pager;
        $data['sort_by']    = $sortBy;
        $data['order']      = $order;
        $data['limit']      = $limit;

        // 7. Render the view
        return view('client_list', $data);
    }
    public function newClient()
    {
        $clientTypeModel = new ClientTypeModel();

        // Fetch client types for the dropdown
        $data['client_types'] = $clientTypeModel->findAll();

        return view('new_client', $data);
    }

    public function saveClient()
    {
        $clientModel = new ClientModel();
        $session = session();

        // Retrieve form data
        $data = [
            'client_type_id' => $this->request->getPost('client_type_id'),
            'reg_name' => $this->request->getPost('reg_name'),
            'reg_no' => $this->request->getPost('reg_no'),
            're_address' => $this->request->getPost('re_address'),
            
        ];

        // Insert data into tm_clients
        if ($clientModel->insert($data)) {
            $session->setFlashdata('success', 'Client added successfully!');
        } else {
            $session->setFlashdata('error', 'Failed to add client.');
        }

        return redirect()->to('/new_client');
    } /* ends save_client */


/* starts: search_clients_page() */

public function search_client_page()
{
    return view('search_client');
}



/* ends: search_clients_page() */






    /* starts: function search() */

    public function search()
    {
        $model = new ClientModel();

        $searchTerm = $this->request->getGet('term'); // Term from the jQuery UI autocomplete input
        if (!$searchTerm) {
            return $this->response->setJSON([]);
        }

        // Query the database
        $clients = $model->like('reg_name', $searchTerm)->findAll();

        // Format the results for jQuery UI
        $result = [];
        foreach ($clients as $client) {
            $result[] = [
                'id' => $client->id,
                'label' => $client->reg_name,
                'address' => $client->re_address,
                'reg_no' => $client->reg_no,
            ];
        }

        return $this->response->setJSON($result);
    }
    /* ends: function search() */
}
