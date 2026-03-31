<?php

namespace App\Controllers;

use App\Models\Kontena;
use App\Models\User;

class Home extends BaseController
{
    public function index()
    {
        helper('form');

        $knt = new Kontena();
        $session = session();

        $kontena = $knt->where('current', 1)->first();
        $sess_dt = ['price' => $kontena['price'],];
        $session->set($sess_dt);
        // dd(session('lang'));

        $data['title'] = lang('app.welcome');
        $data['kontena'] = $kontena;
        $data['kont'] = $knt->where('status', 1)->findAll();
        // dd($data);

        return view('home/index', $data);
    }

    public function locale($locale)
    {
        // dd($locale);

        $session = session();
        $session->remove('lang');
        $session->set('lang', $locale);
        return redirect()->back();
    }

    public function test()
    {
        $usr = new User();
        
        $users = $usr->where('jamia', null)->findAll();

        foreach ($users as $u) {
            $dt = ['jamia' => 'OTHER'];
            $usr->update($u['id'], $dt);
        }
        // dd($users);

        dd('test');
    }
}
