<?php

namespace App\Controllers;

use App\Models\Data;
use App\Models\Kontena;
use App\Models\User;

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
        $usr = new user();
        $dt = new Data();

        $us = $dt->where('paid>', 0)->select('user_id')->distinct()->findAll();
        // $r = $usr->where('risiti!=', null)->findAll();
        // dd($us, $r);

        foreach ($us as $d) {
            $data = [
                'risiti' => $dt->receipt($d['user_id']),
            ];

            $usr->update($d['user_id'], $data);
        }
        // dd($data);

        dd('test');
    }
}
