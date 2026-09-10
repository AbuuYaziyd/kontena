<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Data;
use App\Models\Kontena;
use App\Models\User;

class MalipoController extends BaseController
{
    public function user($id)
    {
        helper('form');

        $usr = new User();

        $user = $usr->find($id);

        $data['title'] = 'Malipo ya Kontena';
        $data['user'] = $user;
        // dd($data);

        return view('malipo/user', $data);
    }

    public function edit($id)
    {
        // dd($this->request->getVar());
        $usr = new User();

        $user = $usr->find($id);

        if ($user['risiti'] == null) {
            $rst = ['risiti' => $dt->receipt($id)];
            $usr->update($id, $rst);
        }

        $data = ['malipo' => $user['malipo'] + $this->request->getVar('pesa')];
        $usr->update($id, $data);

        return redirect()->to('malipo/user/' . $id)->with('toast', 'success')->with('title', 'Malipo ya Kontena yamehifadhiwa Kikamilifu!');
    }

    public function mhasibu($id)
    {
        helper('form');

        $dt = new Data();
        $usr = new User();
        $kn = new Kontena();

        $data['title'] = lang('app.payments');
        $data['dt'] = $dt;
        $data['usr'] = $usr;
        $data['user'] = $usr->find($id);
        $data['current'] = $kn->where('status', 1)->first();
        $data['users'] = $dt->where('mhasibu_id', $id)->select('user_id')->distinct()->findAll();
        $data['knt'] = $dt->where(['user_id' => session('id')])->distinct()->select('kontena_id')->findAll();
        // dd($data);

        return view('malipo/mhasibu', $data);
    }
}
