<?php

namespace App\Controllers;

use App\Models\UserModel;
use CodeIgniter\Controller;

class Auth extends BaseController
{
    /**
     * Displays the registration form (GET)
     * or processes the form data (POST).
     */
    public function register()
    {
        // Load the model
        $userModel = new UserModel();

        // Check the HTTP method
        if ($this->request->getMethod() === 'get') {
            // Display the registration form
            return view('register');
        } 
        elseif ($this->request->getMethod() === 'post') {
            // Set validation rules
            $validationRules = [
                'firstname' => [
                    'label' => 'First Name',
                    'rules' => 'required|min_length[2]|max_length[50]',
                ],
                'lastname'  => [
                    'label' => 'Last Name',
                    'rules' => 'required|min_length[2]|max_length[50]',
                ],
                'email' => [
                    'label' => 'Email Address',
                    'rules' => 'required|valid_email|is_unique[tm_users.email_addr]',
                ],
                'password'  => [
                    'label' => 'Password',
                    'rules' => 'required|min_length[6]',
                ],
                'telephone' => [
                    'label' => 'Telephone Number',
                    'rules' => 'permit_empty|max_length[20]',
                ],
                'address'   => [
                    'label' => 'Physical Address',
                    'rules' => 'permit_empty|max_length[255]',
                ],
            ];

            // Validate the data
            if (! $this->validate($validationRules)) {
                // Validation failed, redisplay the form with errors
                return view('register', [
                    'validation' => $this->validator,
                ]);
            }

            // Validation passed, prepare the data
            $data = [
                'f_name'         => $this->request->getPost('firstname'),
                'm_name'         => $this->request->getPost('middlename'),
                'l_name'         => $this->request->getPost('lastname'),
                'email_addr'     => $this->request->getPost('email'),
                // Hash the password before saving
                'password'       => password_hash($this->request->getPost('password'), PASSWORD_BCRYPT),
                'tel_no'         => $this->request->getPost('telephone'),
                'physic_address' => $this->request->getPost('address'),
            ];

            // Insert into database
            if ($userModel->insert($data)) {
                // Registration successful
                return redirect()->to('registration_success');
            } else {
                // Error inserting data
                return redirect()->back()->with('error', 'An error occurred while registering. Please try again.');
            }
        }

        // Fallback if method is something else
        return redirect()->to('/');
    }

    /**
     * Simple success page after registration
     */
    public function success()
    {
        return view('registration_success');
    }


   //function: login()
   public function login()
    {
        $session = session();

        // Check if the form is submitted
        if ($this->request->getMethod() === 'post') {
            $username = $this->request->getPost('username');
            $password = $this->request->getPost('password');

            $userModel = new UserModel();

            // Fetch user by username
            $user = $userModel->where('username', $username)->first();

            if ($user) {
                // Verify password
                if (password_verify($password, $user['password'])) {
                    // Set session data
                    $session->set([
                        'isLoggedIn' => true,
                        'username' => $user['username'],
                        'user_id' => $user['user_id']
                    ]);

                    // Redirect to dashboard
                    return redirect()->to('dash');
                } else {
                    $session->setFlashdata('error', 'Invalid password.');
                }
            } else {
                $session->setFlashdata('error', 'User not found.');
            }
        }

        // Load the login view with error messages if any
        return view('login', [
            'error' => $session->getFlashdata('error')
        ]);
    }

    public function logout()
    {
        $session = session();
        $session->destroy();
        return redirect()->to('log_in_first');
    }
    
    // ends function login()...

}
