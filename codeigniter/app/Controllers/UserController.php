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
            ->select('user_id, f_name, l_name, tel_no, email_addr')
            ->like('f_name', $searchTerm)
            ->findAll();
    
        $result = [];
        foreach ($users as $user) {
            $result[] = [
                'user_id' => $user['user_id'],
                'label' => $user['f_name'],
                'value' => $user['f_name'],
                'tel_no'=> $user['tel_no'],
                'email_addr'=> $user['email_addr'],
                'url' => site_url('profile/' . $user['user_id'])
            ];
        }
    
        return $this->response->setJSON($result);
    }

    public function getUserType()
    {
        $session = session();
        $userId = $session->get('user_id'); // Retrieve the logged-in user's ID

        $userModel = new UserModel();
        $user = $userModel->getUserType($userId);

        if ($user) {
            return $user['user_type']; // Return the user type
        }

        return null; // Return null if user not found
    }


}