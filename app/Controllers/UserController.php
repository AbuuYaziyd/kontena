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
        $kon = new Kontena();
        $usr = new User();

        $data['title'] = lang('app.user');
        $data['usr'] = $usr;
        $data['kontena'] = $kon->where('current', 1)->first();
        $data['box'] = $usr->selectSum('box')->get()->getRow()->box;
        $data['user'] = $usr->find(session('id'));
        $data['users'] = $usr->where('box>', 0)->findAll();
        $data['wahasibu'] = $usr->where('role', 'mhasibu')->findAll();
        $data['finish'] = round(($usr->selectSum('malipo')->get()->getRow()->malipo) / 100);
        // dd($data);
        
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
            'jamia' => $this->request->getVar('jamia'),
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
        $data['users'] = $dt->select('user_id')->distinct()->findAll();
        $data['wahasibu'] = $usr->where('role', 'mhasibu')->findAll();
        $data['usr'] = $usr;
        $data['current'] = $kn->where('status', 1)->first();
        $data['sum'] = $dt->selectSum('paid')->get()->getRow()->paid;
        $data['knt'] = $dt->where(['user_id' => session('id')])->distinct()->select('kontena_id')->findAll();
        // dd($data);

        return view('user/admin', $data);
    }

    public function box($usr_id)
    {
        helper('form');

        $usr = new User();
        $kt = new Kontena();

        $data['title'] = 'Data za Boxi';
        $data['user'] = $usr->find($usr_id);
        $data['kontena'] = $kt->where('status', 1)->first();
        // dd($data);

        return view('user/box', $data);
    }

    public function add($id)
    {
        $usr = new User();

        $user = $usr->find($id);
        $data = ['box' => $user['box'] + 1];
        // dd($data);

        $dt->update($id, $data);

        return redirect()->back()->with('toast', 'success')->with('text', 'Umeongeza Box Kikamilifu!');
    }
}
