<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Kontena;
use App\Models\User;

class AuthController extends BaseController
{
    public function register()
    {
        if (session('isLoggedIn')) {
            return redirect()->to('data');
        } else {
            helper('form');

            $kont = new Kontena();

            $data['title'] = 'Jisajili Kontena';
            $data['kont'] = $kont->where('status', 1)->first();
            // dd($data);

            return view('auth/register', $data);   
        }
    }

    public function registerAuth()
    {
        // dd($this->request->getVar());
        helper(['form']);

        $rules = [
            'iqama' => [
                'rules'  => 'required|is_unique[users.iqama]|integer|min_length[10]|max_length[10]|',
                'errors' => [
                    'required' => 'Iqama Inahitajika!',
                    'integer' => 'Weka namba Tu!',
                    'is_unique' => 'Tayari namba hizi zishatumika!',
                    'max_length' => 'Namba zisizidi - {param}!',
                    'min_length' => 'Namba zisipungue - {param}!',
                ],
            ],
            'name' => [
                'rules'  => 'required',
                'errors' => [
                    'required' => 'jina la Mhusika linahitajika!',
                ],
            ],
            'jamia' => [
                'rules'  => 'required',
                'errors' => [
                    'required' => 'Weka Chuo Unachosoma!',
                ],
            ],
            'nchi' => [
                'rules'  => 'required',
                'errors' => [
                    'required' => 'Chagua Nchi unayotokea!',
                ],
            ],
            'phone' => [
                'rules'  => 'required|min_length[12]|max_length[12]|is_unique[users.phone]|integer',
                'errors' => [
                    'required' => 'Simu ya Mhusika Inahitajika!',
                    'integer' => 'Weka namba Tu!',
                    'max_length' => 'Namba zisizidi - {param}!',
                    'min_length' => 'Namba zisipungue - {param}!',
                    'is_unique' => 'Tayari namba hii Ishatumika!',
                ],
            ],
        ];

        if ($this->validate($rules)) {
            $usr = new User();

            $data = [
                'iqama' => $this->request->getVar('iqama'),
                'password' => password_hash($this->request->getVar('phone'), PASSWORD_DEFAULT),
                'name' => strtoupper($this->request->getVar('name')),
                'jamia' => $this->request->getVar('jamia'),
                'nchi' => $this->request->getVar('nchi'),
                'phone' => $this->request->getVar('phone'),
            ];

            // dd($data);

            $ok = $usr->save($data);

            if ($ok) {
                return redirect()->to('login')
                ->with('toast', 'success')->with('title', 'Timilifu')
                ->with('msg', 'Umesajiliwa katika Kontena Kikamilifu!');
            }
        } else {
            $data['title'] = 'Sajili Kontena';
            $data['validation'] = $this->validator->getErrors();
            // dd($data);

            return redirect()->back()->with('errors', $this->validator->getErrors())->withInput();
        }
    }

    public function login()
    {
        if (session('isLoggedIn') == true) {
            return redirect()->to('data');
        } else {
            helper(['form']);
            
            $knt = new Kontena();
            
            $data['title'] = 'Ingia';
            $data['kont'] = $knt->where('status', 1)->first();

            return view('auth/login', $data);
        }
    }

    public function loginAuth()
    {
        // dd($this->request->getVar());
        $session = session();
        $userModel = new User();
        $knt = new Kontena();

        $iqama = $this->request->getVar('iqama');
        $password = $this->request->getVar('password');

        $data = $userModel->where('iqama', $iqama)->first();
        // dd($data);

        if ($data) {
            $pass = $data['password'];
            $authenticatePassword = password_verify($password, $pass);
            $kontena = $knt->where('status', 1)->first();

            if ($authenticatePassword) {
                $ses_data = [
                    'id' => $data['id'],
                    'name' => $data['name'],
                    'iqama' => $data['iqama'],
                    'phone' => $data['phone'],
                    'jamia' => $data['jamia'],
                    'nchi' => $data['nchi'],
                    'role' => $data['role'],
                    'price' => $kontena['price'],
                    'isLoggedIn' => TRUE
                ];

                $session->set($ses_data);
                return redirect()->to('data');
            } else {
                return redirect()->to('login')->with('toast', 'error')->with('title', 'Samahani')->with('msg', 'Data Hazipo sawa!');
            }
        } else {
            return redirect()->to('login')->with('toast', 'error')->with('title', 'Samahani')->with('msg', 'Data Hazipo sawa!');
        }
    }
    
    public function Logout()
    {
        $knt = new Kontena();

        $kontena = $knt->where('status', 1)->first();

        $session = session();
        $session->destroy();

        $sess_dt = [
            'price' => $kontena['price'],
        ];

        $session->set($sess_dt);

        return redirect()->to('/');
    }

    public function recover()
    {
        if (session('isLoggedIn') == true) {
            return redirect()->to('data');
        } else {
            helper(['form']);

            $knt = new Kontena();

            $data['title'] = 'Umesahau Password?';

            return view('auth/recover', $data);
        }
    }

    function forgot()
    {
        // dd($this->request->getVar());  
        $usr = new User(); 
        
        $id = $this->request->getVar('user_id');
        $user = $usr->find($id);
        // dd($user);
        $data = ['password' => password_hash($this->request->getVar('phone'), PASSWORD_DEFAULT)];
        // dd($data);

        $usr->update($id, $data);

        return redirect()->back()->with('toast', 'success')->with('title', 'Timilifu')
            ->with('message', 'Password Imebadilishwa Kikamilifu!');
    }
}