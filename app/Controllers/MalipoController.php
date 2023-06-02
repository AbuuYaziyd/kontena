<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Kontena;
use App\Models\Malipo;
use App\Models\Setting;

class MalipoController extends BaseController
{
    public function index()
    {
        // dd(session('role'));
        helper('form');

        $set = new Setting();
        $kont = new Kontena();

        $data['title'] = 'Kontena';
        $data['users'] = $kont->where('paid<jumla')->findAll();
        $data['comp'] = $kont->where('paid=jumla')->findAll();
        $data['data'] = $set->where('set', 'kontena')->first();
        $data['total'] = $kont->countAll();
        $data['baki'] = $kont->where('paid<jumla')->countAllResults();
        $data['maliza'] = $kont->where('paid=jumla')->countAllResults();
        $data['box'] = $kont->selectSum('idadi')->get()->getRow()->idadi;
        $data['admin'] = $kont->where('role', 'admin')->get()->getFirstRow();
        // dd($data);

        return view('malipo/index', $data);
    }

    public function make($id)
    {
        helper('form');

        $set = new Setting();
        $kont = new Kontena();

        $data['title'] = 'Kontena Malipo';
        $data['data'] = $set->where('set', 'kontena')->first();
        $data['kont'] = $kont->find($id);
        // dd($data);

        return view('malipo/make', $data);
    }

    public function risiti($id)
    {
        $set = new Setting();
        $malipo = new Malipo();
        $kont = new Kontena();

        $data['kontena'] = $set->where('set', 'kontena')->first();
        $data['malipo'] = $malipo->where('user_id', $id)->findAll();
        $data['user'] = $kont->find($id);
        // dd($data);

        return view('malipo/risiti', $data);
    }
    public function edit($id)
    {
        // dd($this->request->getVar());
        $malipo = new Malipo();
        $kont = new Kontena();
        $set = new Setting();

        // Invoice 4mula
        $invc = $id.date('s');
        $invc = "KONT" . date("mhi") . sprintf('%05s', $invc);
        $price = $set->find(1)['price'];
        // dd($price); 

        $user = $malipo->where('user_id', $id)->orderBy('id', 'desc')->first();
        // dd($user);

        if ($this->request->getVar('leo')) {
            $dt = [
                'user_id' => $id,
                'lengo' => strtoupper($this->request->getVar('lengo')),
                'amount' => $this->request->getVar('leo'),
                'total' => $this->request->getVar('leo')+($user['total']??0),
                'amount' => $this->request->getVar('leo'),
                'receipt' => $invc,
            ];
            // dd($dt);

            $malipo->save($dt);
        }

        $d = [
            'idadi' => $this->request->getVar('idadi'),
            'jumla' => $price * $this->request->getVar('idadi'),
        ];
        
        if ($this->request->getVar('leo')) {
            $d = [
                'idadi' => $this->request->getVar('idadi'),
                'jumla' => $price * $this->request->getVar('idadi'),
                'paid' => $this->request->getVar('leo')+($user['total']??0),
                'risiti' => $invc,
            ];
        }
        // dd($d);

        $kont->update($id, $d);

        return redirect()->to('malipo')
        ->with('toast', 'success')
        ->with('message', 'Malipo ya Kontena yamehifadhiwa Kikamilifu!');
    }

    public function whatsapp($num, $id)
    {
        helper('form');
        // dd($num);
        $kont = new Kontena();

        $user = $kont->find($id);
        // dd($user['jumla']-$user['paid']);
        if ($user['paid'] == $user['jumla']) {
            // $data['ujumbe'] = 'Amemaliza Malipo';
            return redirect()->back();
        } elseif ($user['paid'] < $user['jumla']){
            $rem = $user['jumla']-$user['paid'];
            $data['ujumbe'] = 'Assalaamu Alaikum warahmatullahi Wabarakaatuh! 
            
Ndugu '.$user['mhusika'].'   
Mpaka sasa umelipia kiasi cha *riyali '.$user['paid'].'*, bado kiasi cha *riyali '.$rem.'*. 

*Je, unahitaji kupunguza Box?*
*Au unataraji lini kumaliza Malipo?*

Baarakallahu Fiykum!';
            $data['namba'] = $num;
            $data['title'] = 'Wasiliana WhatsApp';
        }
        
        // dd($data);
        // dd(rawurlencode($data['ujumbe']));

        return view('malipo/send', $data);
    }

    public function send()
    {
        // dd($this->request->getVar());
        $namba = $this->request->getVar('namba');
        $ujumbe = $this->request->getVar('ujumbe');
        // dd('https://wa.me/'.$namba.'?text='.rawurlencode($ujumbe));

        return redirect()->to('https://wa.me/'.$namba.'?text='.rawurlencode($ujumbe));
    }
}