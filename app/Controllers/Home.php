<?php

namespace App\Controllers;

use App\Models\Kontena;
use App\Models\User;

class Home extends BaseController
{
    public function index()
    {
        $knt = new Kontena();
        $usr = new User();

        $kontena = $knt->where('current', 1)->first();

        $data['title'] = lang('app.welcome');
        $data['kontena'] = $kontena;
        $data['box'] = $usr->selectSum('box')->get()->getRow()->box;
        $data['finish'] = round(($usr->selectSum('malipo')->get()->getRow()->malipo)/100);
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
        dd('test');
    }
}
