<?php

namespace App\Controllers;

use App\Controllers\BaseController;
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

    public function page($id)
    {
        $kon = new Kontena();
        $usr = new User();

        $data['title'] = lang('app.userData');
        $data['usr'] = $usr;
        $data['kontena'] = $kon->where('current', 1)->first();
        $data['box'] = $usr->selectSum('box')->get()->getRow()->box;
        $data['user'] = $usr->find($id);
        $data['users'] = $usr->where('box>', 0)->findAll();
        $data['wahasibu'] = $usr->where('role', 'mhasibu')->findAll();
        $data['finish'] = round(($usr->selectSum('malipo')->get()->getRow()->malipo) / 100);
        // dd($data);

        return view('user/index', $data);
    }

    public function profile($id)
    {
        helper('form');

        $usr = new User();
        $knt = new Kontena();

        $data['title'] = lang('app.userData');
        $data['user'] = $usr->find($id);
        $data['boxes'] = $usr->selectSum('box')->get()->getRow()->box;
        $data['kontena'] = $knt->where('current', 1)->first();
        // dd($data);

        return view('user/profile', $data);
    }

    public function update()
    {
        // dd($this->request->getVar());
        $usr = new User();

        $id = $this->request->getVar('id');
        $user = $usr->find($id);
        // dd($id, $user);

        $data = [
            'name' => strtoupper($this->request->getVar('name')),
            'phone' => $this->request->getVar('phone'),
            'iqama' => $this->request->getVar('iqama'),
            'jamia' => $this->request->getVar('jamia'),
            'mpokeaji' => $this->request->getVar('mpokeaji'),
            'simu' => $this->request->getVar('simu'),
            'box' => intval($user['box']) + intval($this->request->getVar('box') ?? 0),
        ];
        // dd($data);

        $usr->update($id, $data);

        return redirect()->to('user/page/' . $id)->with('toast', 'success')->with('message', lang('app.successfully'))->with('title', lang('app.done'));
    }

    public function admin()
    {
        helper('form');

        $usr = new User();
        $kn = new Kontena();

        $data['title'] = lang('app.admin');
        $data['users'] = $usr->orderBy('box', 'desc')->findAll();
        $data['wahasibu'] = $usr->where('role', 'mhasibu')->findAll();
        $data['usr'] = $usr;
        $data['current'] = $kn->where('status', 1)->first();
        $data['malipo'] = $usr->selectSum('malipo')->get()->getRow()->malipo;
        // dd($data);

        return view('user/admin', $data);
    }

    public function risiti($id)
    {
        $set = new Kontena();
        $usr = new User();

        $kontena = $set->where('current', 1)->first();
        $user = $usr->find($id);

        $data['title'] = lang('app.receipt');
        $data['user'] = $user;
        $data['kontena'] = $kontena;
        $data['malipo'] = $usr->where('id', $id)->selectSum('malipo')->get()->getRow()->malipo;
        $data['jumla'] = $kontena['price'] * $user['box'];
        // dd($data);

        return view('user/risiti', $data);
    }
}
