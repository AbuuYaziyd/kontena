<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Data;
use App\Models\Kontena;
use App\Models\Malipo;
use App\Models\Setting;
use App\Models\User;

class MalipoController extends BaseController
{
    // public function index()
    // {
    //     // dd(session('role'));
    //     helper('form');

    //     $kont = new Kontena();

    //     // $data['title'] = 'Kontena';
    //     // $data['nje'] = $kont->where('jamia', 'mgeni')->findAll();
    //     // $data['ndani'] = $kont->where('jamia!=', 'mgeni')->findAll();
    //     // $data['out'] = $kont->where('jamia', 'mgeni')->countAllResults();
    //     // $data['in'] = $kont->where('jamia!=', 'mgeni')->countAllResults();
    //     // $data['data'] = $set->where('set', 'kontena')->first();
    //     $data['total'] = $kont->where('idadi>=', 0)->countAllResults();
    //     // $data['baki'] = $kont->where('paid<jumla')->countAllResults();
    //     $data['maliza'] = $kont->where(['paid=jumla', 'paid>'=>0])->countAllResults();
    //     $data['comp'] = $kont->where(['paid=jumla', 'paid>'=>0])->findAll();
    //     $data['mishkila'] = $kont->where(['idadi'=>0])->findAll();
    //     // $data['box'] = $kont->selectSum('idadi')->get()->getRow()->idadi;

    //     $data['title'] = 'Kontena';
    //     $data['users'] = $kont->where('jumla>paid')->findAll();
    //     // $data['comp'] = $kont->where(['paid=jumla', 'paid>'=>0])->findAll();
    //     // $data['total'] = $kont->countAll();
    //     $data['baki'] = $kont->where('paid<jumla')->countAllResults();
    //     // $data['maliza'] = $kont->where('paid=jumla')->countAllResults();
    //     $data['box'] = $kont->selectSum('idadi')->get()->getRow()->idadi;
    //     $data['admin'] = $kont->where('role', 'admin')->get()->getFirstRow();
    //     // dd($data);

    //     return view('malipo/index', $data);
    // }

    public function user($id)
    {
        helper('form');

        $dt = new Data();
        $usr = new User();

        $user = $usr->find($id);

        $data['title'] = 'Malipo ya Kontena';
        $data['user'] = $user;
        $data['data'] = $dt;
        $data['kont'] = $dt->where('user_id', $id)->first();
        $data['box'] = $dt->where('user_id', $id)->findAll();
        $data['sum'] = $dt->where('user_id', $id)->selectSum('paid')->get()->getRow()->paid;
        $data['chenji'] = $dt->where(['user_id' => $id, 'paid>' => 0, 'paid<' => session('price')])->first()['paid']??0;
        // dd($data);

        return view('malipo/user', $data);
    }

    public function edit($id)
    {
        // dd($this->request->getVar());
        $dt = new Data();
        
        $pesa = $this->request->getVar('pesa');
        $chenji = $this->request->getVar('chenji');

        if ($chenji > 0) {
            $pesa = $pesa + $chenji;
            $futa_chenji = $dt->where(['paid' => $chenji, 'user_id' => $id])->first();
            // dd($futa_chenji);

            $data = ['paid' => 0];
            // dd($data);

            $dt->update($futa_chenji['id'], $data);
        }

        $no_box_paid = intval($pesa / session('price'));
        $remain = $pesa % session('price');
        // dd($no_box_paid, $remain, $pesa);

        if ($no_box_paid > 0) {
            $total_boxes = $dt->where(['user_id' => $id, 'paid' => 0])->findAll($no_box_paid);
            // dd($total_boxes);

            foreach ($total_boxes as $d) {
                $data = ['paid' => session('price')];

                $dt->update($d['id'], $data);
            }
            // dd($data);
        }

        if ($remain != 0) {
            $data = ['paid' => $remain];

            $chenji = $dt->where(['user_id' => $id, 'paid' => 0])->first();

            $dt->update($chenji['id'], $data);
            // dd($data);

            return redirect()->to('malipo/user/' . $id)
            ->with('toast', 'success')
            ->with('message', 'Malipo ya Kontena yamehifadhiwa Kikamilifu! Chenji ilobaki ni: ' . $remain . 'SAR');
        } 

        return redirect()->to('malipo/user/' . $id)
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