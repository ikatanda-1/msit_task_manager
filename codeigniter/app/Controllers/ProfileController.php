<?php

namespace App\Controllers;

use App\Models\UserModel;

class ProfileController extends BaseController
{
    public function index($userId)
    {
        $userModel = new UserModel();
        $userData = $userModel->getUserProfile($userId);

        if (!$userData) {
            return redirect()->to('/404'); // Redirect to a 404 page if user not found
        }

        return view('profile', ['user' => $userData]);
    }
}
