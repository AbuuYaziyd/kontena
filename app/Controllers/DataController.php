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

        $data['title'] = 'Data';
        $data['data'] = $dt;
        $data['users'] = $dt->select('user_id')->distinct()->findAll();
        $data['knt'] = $dt->where(['user_id' => session('id')])->distinct()->select('kontena_id')->findAll();
        // dd($data);

        return view('data/index', $data);
    }

    public function new()
    {
        helper('form');

        $knt = new Kontena();

        $data['title'] = 'Sajili Box';
        $data['knt'] = $knt->where(['status' => 1])->first();
        // dd($data);

        return view('data/new', $data);
    }

    public function create()
    {
        // dd($this->request->getVar());
        $dt = new Data();

        for ($i=0; $i < $this->request->getVar('idadi'); $i++) {
            $data = [
                'user_id' => session('id'),
                'kontena_id' => $this->request->getVar('kontena_id'),
                'mpokeaji' => $this->request->getVar('mpokeaji'),
                'fikia' => strtoupper($this->request->getVar('fikia')),
                'phone' => $this->request->getVar('phone'),
            ];
            // dd($data);

            $ok = $dt->save($data);
        }


        if ($ok) {
            return redirect()->to('data')
            ->with('toast', 'success')->with('title', 'Timilifu')
            ->with('message', 'Umesajili Box zako Kikamilifu!');
        }
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
        // dd($box);

        foreach ($box as $d) {
            $m = ($d['fikia'] == 'DAR' ? 1 : ($d['fikia'] == 'ZNZ' ? 2 : 3));
            // dd($m);

            $code = $dt->where('code!=', null)->orderBy('code', 'desc')->first();
            // dd($code);
            if ($code != null) {
                $code = substr($code['code'], 1);
                $code = $code + 1;
                $code = $m . sprintf('%03s', $code);
                // dd($code);
            } else {
                $code = $m . sprintf('%03s', 1);
                // dd($code);
            }
            // $code = $dt->code($d['id'], session('id'));
            $data = ['code' => $code];
            // dd($data);

            $dt->update($d['id'], $data);
        }
        // dd($data);

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
        $knt = new Kontena();

        $box = $dt->find($id);
        // dd($box);

        $dt->delete($id);
        
        $find = $dt->where('user_id', $box['user_id'])->findAll();

        if ($find <= 0) {
            $kontena = $knt->where('status', 1)->first();

            $session = session();
            $session->destroy();

            $sess_dt = [
                'price' => $kontena['price'],
            ];

            $session->set($sess_dt);

            return redirect()->to('/')
            ->with('toast', 'success')
            ->with('title', 'Umefuta Box zote Kikamilifu!')
            ->with('message', 'INgia Upya Kama unahitaji kusajili tena box kwenye kontena!');
        }

        return redirect()->to('data/box/' . $box['kontena_id'] . '/' . $box['user_id']);
    }
}
