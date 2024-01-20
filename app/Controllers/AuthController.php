<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Auth;

class AuthController extends BaseController
{
    public function signin()
    {
        if (session('isLoggedIn') == true) {
            return redirect()->to('malipo');
        } else {
            helper(['form']);
            
            $data['title'] = 'Ingia';
            return view('auth/signin', $data);
        }
    }

    public function loginAuth()
    {
        // dd($this->request->getVar());
        $session = session();
        $userModel = new Auth();

        $iqama = $this->request->getVar('iqama');
        $password = $this->request->getVar('password');

        $data = $userModel->where('username', $iqama)->first();
        // dd($data);

        if ($data) {
            $pass = $data['password'];
            $authenticatePassword = password_verify($password, $pass);
            if ($authenticatePassword) {
                $ses_data = [
                    'id' => $data['id'],
                    'role' => $data['role'],
                    'isLoggedIn' => TRUE
                ];

                $session->set($ses_data);
                return redirect()->to('malipo');
            } else {
                $session->setFlashdata('msg', 'Password Umeikosea!');
                return redirect()->to('login')->with('toast', 'warning')->with('type', 'warning');
            }
        } else {
            $session->setFlashdata('msg', 'Data Hazipo sawa!');
            return redirect()->to('login')->with('toast', 'info')->with('type', 'info');
        }
    }
    
    public function Logout()
    {
        $session = session();
        $session->destroy();
        return redirect()->to('/');
    }
}