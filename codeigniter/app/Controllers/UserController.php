<?php
namespace App\Controllers;

use App\Models\UserModel;
use CodeIgniter\Controller;

class UserController extends BaseController
{
    
    public function index()
    {
        $userModel = new UserModel(); // Instantiate the model

        // Fetch users with the necessary joins
        $users = $userModel->getUsers();

        // Pass the data to the view
        $data['users'] = $users;
        return view('user_view', $data);
    }
    

    public function searchUser()
    {
        
        $userModel = new UserModel();
        $searchTerm = $this->request->getGet('term');
    
        $users = $userModel
            ->select('user_id, f_name, l_name')
            ->like('f_name', $searchTerm)
            ->findAll();
    
        $result = [];
        foreach ($users as $user) {
            $result[] = [
                'user_id' => $user['user_id'],
                'label' => $user['f_name'],
                'value' => $user['f_name'],
                'url' => site_url('profile/' . $user['user_id'])
            ];
        }
    
        return $this->response->setJSON($result);
    }


}