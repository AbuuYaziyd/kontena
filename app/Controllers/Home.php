<?php

namespace App\Controllers;

use App\Models\Kontena;

class Home extends BaseController
{
    public function index()
    {
        helper('form');

        $knt = new Kontena();
        $session = session();

        $kontena = $knt->where('status', 1)->first();
        $sess_dt = ['price' => $kontena['price'],];
        $session->set($sess_dt);

        $data['title'] = 'Kontena';
        $data['kont'] = $knt->where('status', 1)->findAll();
        // dd($data);

        return view('home/index', $data);
    }

    public function test()
    {
        dd('test');
    }
}
