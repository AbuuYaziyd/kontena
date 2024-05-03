<?php

namespace App\Controllers;

use App\Models\Admin;
use App\Models\Data;
use App\Models\Kontena;
use App\Models\User;

class Home extends BaseController
{
    public function index()
    {
        helper('form');


        $dt = new Data();
        $knt = new Kontena();

        $session = session();

        $kontena = $knt->where('status', 1)->first();

        $sess_dt = [
            'price' => $kontena['price'],
        ];

        $session->set($sess_dt);

        $data['title'] = 'Kontena';
        $data['kont'] = $knt->where('status', 1)->findAll();
        // dd($data);

        return view('home/index', $data);
    }

    public function test()
    {
        $dt = new user();

        $us = $dt->findAll();
        dd($us);

        dd('test');
    }
}
