<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Data;
use App\Models\Kontena;
use App\Models\User;
use CodeIgniter\HTTP\ResponseInterface;

class DataController extends BaseController
{
    public function index()
    {
        helper('form');

        $dt = new Data();
        // $knt = new Kontena();

        $data['title'] = 'Data';
        $data['data'] = $dt;
        $data['users'] = $dt->select('user_id')->distinct()->findAll();
        $data['knt'] = $dt->where(['user_id' => session('id')])->distinct()->select('kontena_id')->findAll();
        // dd($data);

        return view('data/index', $data);
    }

    public function box($knt, $usr)
    {
        helper('form');

        $dt = new Data();
        $kt = new Kontena();

        $data['title'] = 'Data za Boxi';
        $data['data'] = $dt->where(['kontena_id' => $knt, 'user_id' => $usr])->findAll();
        $data['code'] = $dt->where(['user_id' => $usr, 'paid' => session('price'), 'code' => null])->findAll();
        $data['boxCount'] = $dt->countAllResults();
        $data['kontena'] = $kt->where('status', 1)->first();
        // dd($data);

        return view('data/box', $data);
    }

    public function view($id)
    {
        helper('form');

        $dt = new Data();
        $usr = new User();

        $box = $dt->find($id);
        $user = $usr->find($box['user_id']);

        $data['title'] = 'Maelezo ya Boxi';
        $data['box'] = $box;
        $data['user'] = $user;
        // dd($data);

        return view('data/view', $data);
    }

    public function print($id)
    {
        $usr = new User();
        $dt = new Data();

        $box = $dt->find($id);

        $data['title'] = 'Karatasi ya Box';
        $data['box'] = $box;
        $data['user'] = $usr->find($box['user_id']);
        // dd($data);

        return view('data/print', $data);
    }

    public function edit($id)
    {
        // dd($this->request->getVar());
        $dt = new Data();

        $data = [
            'mpokeaji' => strtoupper($this->request->getVar('mpokeaji')),
            'fikia' => $this->request->getVar('fikia'),
            'phone' => $this->request->getVar('phone'),
        ];

        // dd($data);

        $ok = $dt->update($id, $data);

        $check = $dt->find($id);
        $fk = $this->request->getVar('fikia');

        if ($check['code'] != null && $check['fikia'] != $this->request->getVar('fikia')) {
            $m = ($fk == 'DAR' ? 1 : ($fk == 'ZNZ' ? 2 : 3));
            $code = substr($check['code'], 1);
            $code = $m . sprintf('%03s', $code);
            $data = ['code' => $code];

            $dt->update($id, $data);
        }

        if ($ok) {
            return redirect()->to('data')
            ->with('toast', 'success')
            ->with('message', 'Umesasisha Maelezo Kikamilifu!');
        }
    }

    public function code($id)
    {
        $usr = new User();
        $dt = new Data();

        $box = $dt->find($id);

        $data['title'] = 'Karatasi ya Box';
        $data['box'] = $box;
        $data['user'] = $usr->find($box['user_id']);
        // dd($data);

        return view('data/code', $data);
    }

    public function coded()
    {
        $dt = new Data();

        $box = $dt->where('user_id', session('id'))->findAll();

        foreach ($box as $d) {
            $code = $dt->code($d['id'], session('id'));
            $data = ['code' => $code];

            $dt->update($d['id'], $data);
        }
        // dd($code);

        return redirect()->back();
    }

    public function add()
    {
        $dt = new Data();

        $box = $dt->where('user_id', session('id'))->first();
        $data = [
            'mpokeaji' => $box['mpokeaji'],
            'phone' => $box['phone'],
            'fikia' => $box['fikia'],
            'user_id' => $box['user_id'],
            'kontena_id' => $box['kontena_id'],
        ];
        // dd($data);
        
        $dt->save($data);

        return redirect()->back()
            ->with('toast', 'success')
            ->with('message', 'Umeongeza Box Kikamilifu!');
    }

    public function delete($id)
    {
        $dt = new Data();

        $box = $dt->find($id);
        // dd($box);

        $dt->delete($id);

        return redirect()->to('data/box/' . $box['kontena_id'] . '/' . $box['user_id']);
    }
}
