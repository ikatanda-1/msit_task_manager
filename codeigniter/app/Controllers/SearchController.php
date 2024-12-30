<?php

namespace App\Controllers;

use App\Models\ClientModel;
use CodeIgniter\Controller;

class SearchController extends Controller
{
    public function index()
    {
        return view('search_view');
    }

    public function autocomplete()
    {
        $model = new ClientModel();
        $term = $this->request->getGet('term');
        $results = $model->like('reg_name', $term)->findAll();

        $data = [];
        foreach ($results as $row) {
            $data[] = [
                'id' => $row['id'],
                'value' => $row['reg_name']
            ];
        }

        return $this->response->setJSON($data);
    }
}
