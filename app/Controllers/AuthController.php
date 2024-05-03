<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Data;
use App\Models\Kontena;
use App\Models\User;

class AuthController extends BaseController
{
    public function register()
    {
        helper('form');
        
        $kont = new Kontena();

        $data['title'] = 'Jisajili Kontena';
        $data['kont'] = $kont->where('status', 1)->first();
        // dd($data);

        return view('auth/register', $data);
    }

    public function registerAuth()
    {
        dd($this->request->getVar());
        helper(['form']);

        $rules = [
            'iqama' => [
                'rules'  => 'required|is_unique[kontena.iqama]|integer',
                'errors' => [
                    'required' => 'Iqama Inahitajika!',
                    'integer' => 'Weka namba Tu!',
                    'is_unique' => 'Tayari Ushatuma Maombi!',
                ],
            ],
            'mhusika' => [
                'rules'  => 'required',
                'errors' => [
                    'required' => 'Mhusika Anahitajika!',
                ],
            ],
            'jamia' => [
                'rules'  => 'required',
                'errors' => [
                    'required' => 'Weka Chuo Unachotoka!',
                ],
            ],
            'idadi' => [
                'rules'  => 'required',
                'errors' => [
                    'required' => 'Weka Idadi ya Box!',
                ],
            ],
            'fikia' => [
                'rules'  => 'required',
                'errors' => [
                    'required' => 'Chagua Mafikio ya box zako!',
                ],
            ],
            'mpokeaji' => [
                'rules'  => 'required',
                'errors' => [
                    'required' => 'Weka Jina kamili la Mpokeaji!',
                ],
            ],
            'nchi' => [
                'rules'  => 'required',
                'errors' => [
                    'required' => 'Chagua Nchi yako!',
                ],
            ],
            'simu1' => [
                'rules'  => 'required|min_length[12]|max_length[12]',
                'errors' => [
                    'required' => 'Simu ya Mhusika Inahitajika!',
                    'max_length' => 'Namba zisizidi - {param}!',
                    'min_length' => 'Namba zisipungue - {param}!',
                ],
            ],
            'simu2' => [
                'rules'  => 'required|min_length[12]|max_length[12]',
                'errors' => [
                    'required' => 'Simu ya Mpokeaji Inahitajika!',
                    'max_length' => 'Namba zisizidi - {param}!',
                    'min_length' => 'Namba zisipungue - {param}!',
                ],
            ],
        ];

        if ($this->validate($rules)) {
            $kont = new Kontena();

            $data = [
                'iqama' => $this->request->getVar('iqama'),
                'password' => password_hash($this->request->getVar('simu1'), PASSWORD_DEFAULT),
                'mhusika' => strtoupper($this->request->getVar('mhusika')),
                'jamia' => $this->request->getVar('jamia'),
                'idadi' => $this->request->getVar('idadi'),
                'fikia' => $this->request->getVar('fikia'),
                'mpokeaji' => strtoupper($this->request->getVar('mpokeaji')),
                'nchi' => $this->request->getVar('nchi'),
                'simu1' => $this->request->getVar('simu1'),
                'simu2' => $this->request->getVar('simu2'),
                'simu3' => $this->request->getVar('simu3'),
                'jumla' => $this->request->getVar('amount') * $this->request->getVar('idadi'),
                'mwaka' => date('Y'),
            ];

            // dd($data);

            $ok = $kont->save($data);

            if ($ok) {
                return redirect()->to('kontena')
                ->with('toast', 'success')
                ->with('message', 'Umetuma Maombi ya Kontena Kikamilifu!');
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
            
            $data['title'] = 'Ingia';
            return view('auth/login', $data);
        }
    }

    public function loginAuth()
    {
        // dd($this->request->getVar());
        $session = session();
        $userModel = new User();
        $dt = new Data();
        $knt = new Kontena();

        $iqama = $this->request->getVar('iqama');
        $password = $this->request->getVar('password');

        $data = $userModel->where('iqama', $iqama)->first();
        // dd($data);

        if ($data) {
            $pass = $data['password'];
            $authenticatePassword = password_verify($password, $pass);
            $kontena = $knt->where('status', 1)->first();
            $boxCount = $dt->countAllResults();

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
                $session->setFlashdata('msg', 'Data Hazipo sawa!');
                return redirect()->to('login')->with('toast', 'error')->with('type', 'error');
            }
        } else {
            $session->setFlashdata('msg', 'Data Hazipo sawa!');
            return redirect()->to('login')->with('toast', 'info')->with('type', 'info');
        }
    }
    
    public function Logout()
    {
        $dt = new Data();
        $knt = new Kontena();

        $kontena = $knt->where('status', 1)->first();

        $session = session();
        $session->destroy();

        $sess_dt = [
            'price' => $kontena['price'],
        ];

        $session->set($sess_dt);
        // dd(session('boxCount'));

        return redirect()->to('/');
    }
}