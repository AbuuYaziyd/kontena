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

            $data['title'] = lang('app.signup');
            $data['kont'] = $kont->where('status', 1)->first();
            // dd($data);

            return view('auth/register', $data);   
        }
    }

    public function registerAuth()
    {
        // dd($this->request->getVar());
        helper(['form']);

        $input = $this->validate(
            [   //Rules
                'iqama' => 'required|is_unique[users.iqama]|integer|exact_length[10]',
                'name' => 'required|min_length[3]',
                'jamia' => 'required',
                'nchi' => 'required',
                'phone' => 'required|min_length[10]|max_length[12]|is_unique[users.phone]|integer',
            ],
            [   // Errors
                'iqama' =>
                [
                    'required' => lang('error.required'),
                    'integer' => lang('error.integer'),
                    'is_unique' => lang('error.is_unique'),
                    'exact_length' => lang('error.exact_length'),
                ],
                'name' =>
                [
                    'required' => lang('error.required'),
                    'min_length' => lang('error.min_length'),
                ],
                'jamia' =>
                [
                    'required' => lang('error.required'),
                ],
                'nchi' =>
                [
                    'required' => lang('error.required'),
                ],
                'phone' => [
                    'required' => lang('error.required'),
                    'integer' => lang('error.integer'),
                    'is_unique' => lang('error.is_unique'),
                    'max_length' => lang('error.max_length'),
                    'min_length' => lang('error.min_length'),
                ],
            ]
        );
        // dd($input);

        if (!$input) {
            $data['title'] = 'Sajili Kontena';
            $data['validation'] = $this->validator->getErrors();
            // dd($data);

            return redirect()->back()->with('errors', $this->validator->getErrors())->withInput();
        } else {
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
                    ->with('text', 'Umesajiliwa katika Kontena Kikamilifu! Kuingia kwenye system Tumia Iqama na password ni NAMBA ZAKO ZA SIMU');
            }
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
                return redirect()->to('login')->with('toast', 'error')->with('title', 'Samahani')->with('text', 'Data Hazipo sawa!');
            }
        } else {
            return redirect()->to('login')->with('toast', 'error')->with('title', 'Samahani')->with('text', 'Data Hazipo sawa!');
        }
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

    public function recoverAuth()
    {
        // dd($this->request->getVar());

        $usr = new User();

        $iqama = $this->request->getVar('iqama');
        $nchi = $this->request->getVar('nchi');
        $jamia = $this->request->getVar('jamia');

        $user = $usr->where(['iqama' => $iqama, 'nchi' => $nchi, 'jamia' => $jamia])->first();
        // dd($user);

        if (!$user) {
            return redirect()->back()->with('toast', 'error')->with('title', 'Samahani')->with('text', 'Maelezo ya mtumiaji hayapo sawa!');
        } else {
            $dt = ['password' => password_hash($user['phone'], PASSWORD_DEFAULT)];
            // dd($dt);

            $usr->update($user['id'], $dt);

            return redirect()->to('login')->with('toast', 'success')->with('title', 'Timilifu')->with('text', 'Password yako ya sasa ni:' . $user['phone']);
        }
    }

    public function change()
    {
        helper(['form']);

        $data['title'] = lang('app.changePassword');

        return view('auth/change', $data);
    }

    public function password()
    {
        // dd($this->request->getVar());

        $usr = new User();

        $old = $this->request->getVar('old');
        $new = $this->request->getVar('new');

        $user = $usr->find(session('id'));
        // dd($user);

        $authenticatePassword = password_verify($old, $new);
        // dd($authenticatePassword);

        if (!$authenticatePassword) {
            return redirect()->back()->with('toast', 'error')->with('title', 'Samahani')->with('text', 'Data hazipo sawa!');
        } else {
            $dt = ['password' => password_hash($new, PASSWORD_DEFAULT)];
            // dd($dt);

            $usr->update($user['id'], $dt);

            return redirect()->to('data')->with('toast', 'success')->with('title', 'Timilifu')->with('text', 'Password Imebadilishwa Kikamilifu!');
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

    public function Logout()
    {
        $knt = new Kontena();

        $kontena = $knt->where('current', 1)->first();
        $lang = session('lang');

        $session = session();
        $session->destroy();

        $sess_dt = [
            'price' => $kontena['price'],
            'lang' => $lang,
        ];

        $session->set($sess_dt);

        return redirect()->to('/');
    }
}
