<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Data;
use App\Models\Kontena;
use App\Models\User;

class UserController extends BaseController
{
    public function index()
    {
        $data['title'] = 'Mtumiaji';
        
        return view('user/index', $data);
    }

    public function profile()
    {
        helper('form');

        $usr = new User();

        $data['title'] = 'Maelezo ya Mtumiaji';
        $data['user'] = $usr->find(session('id'));
        // dd($data);

        return view('user/profile', $data);
    }

    public function edit($id)
    {
        // dd($this->request->getVar());
        $usr = new User();

        $data = [
            'name' => strtoupper($this->request->getVar('name')),
            'phone' => $this->request->getVar('phone'),
            'iqama' => $this->request->getVar('iqama'),
        ];

        // dd($data);

        $ok = $usr->update($id, $data);

        if ($ok) {
            return redirect()->to('data')
            ->with('toast', 'success')
            ->with('message', 'Umesasisha Data zako Kikamilifu!');
        }
    }

    public function receiver()
    {
        helper('form');

        $dt = new Data();

        $data['title'] = 'Maelezo ya Mpokeaji';
        $data['user'] = $dt->where('user_id', session('id'))->first();
        $data['box'] = $dt->where('user_id', session('id'))->findAll();
        // dd($data);

        return view('user/receiver', $data);
    }

    public function receiverEdit($id)
    {
        // dd($this->request->getVar());
        $dt = new Data();

        $data = [
            'mpokeaji' => strtoupper($this->request->getVar('mpokeaji')),
            'phone' => $this->request->getVar('phone'),
            'fikia' => $this->request->getVar('fikia'),
        ];

        // dd($data);

        $user = $dt->where('user_id', $id)->findAll();
        // dd($user);

        foreach ($user as $d) {
            $dt->update($d['id'], $data);
        }

        return redirect()->to('data')->with('toast', 'success')->with('message', 'Umesasisha Data zako Kikamilifu!');
    }

    public function admin()
    {
        helper('form');

        $usr = new User();
        $dt = new Data();
        $kn = new Kontena();

        $data['title'] = 'Mtumiaji';
        $data['users'] = $usr->findAll();
        $data['data'] = $dt;
        $data['current'] = $kn->where('status', 1)->first();
        $data['knt'] = $dt->where(['user_id' => session('id')])->distinct()->select('kontena_id')->findAll();
        // dd($data);

        return view('user/admin', $data);
    }
}
