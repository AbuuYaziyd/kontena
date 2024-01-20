<?php

namespace App\Controllers;

use App\Models\Kontena;
use App\Models\Setting;
use CodeIgniter\Config\Services;

class Home extends BaseController
{
    public function index()
    {
        // dd('jhgf');
        return redirect()->to('kontena');
    }
    
    public function home()
    {
        return redirect()->to('http://tzmadinah.rf.gd');
    }

    public function data()
    {
        // dd($this->request->getVar());
        helper('form');

        $kont = new Kontena();
        $set = new Setting();
        
        $data['title'] = 'Kontena';
        $data['data'] = $set->where('set', 'kontena')->first();
        $data['total'] = $kont->countAll();
        $data['baki'] = $kont->where('paid<jumla')->countAllResults();
        $data['maliza'] = $kont->where('paid=jumla')->countAllResults();
        $data['box'] = $kont->selectSum('idadi')->get()->getRow()->idadi;
        $data['kont'] = $kont->find(1);
        // dd($data);

        return view('kontena/found', $data);
    }

    public function test()
    {
        // dd('ytyu');

        $email = \Config\Services::email();
        $email = Services::email();

        // $filename = base_url('asset/img/logo.svg');
        // $email->attach($filename);

        $email->setTo('someone@example.com');
        // $cid = $email->setAttachmentCID($filename);
        $email->setSubject('Email Test ');
        // $email->setMessage('Testing the email class.<img src="cid:' . $cid . '" alt="photo1">');
        // $email->setMessage('');

        $email->send(false);

        dd($email->printDebugger());

        // if($email->send()){
        //     dd('Email was Sent!');
        // } else {
        //     dd('Email was not sent!');
        // }
    }
}
