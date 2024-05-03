<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Kontena;
use CodeIgniter\HTTP\ResponseInterface;

class KontenaController extends BaseController
{
    // public function index()
    // {
    //     helper('form');

    //     $kont = new Kontena();

    //     $data['title'] = 'Kontena';
    //     $data['nje'] = $kont->where('jamia', 'mgeni')->findAll();
    //     $data['ndani'] = $kont->where('jamia!=', 'mgeni')->findAll();
    //     $data['out'] = $kont->where('jamia', 'mgeni')->countAllResults();
    //     $data['in'] = $kont->where('jamia!=', 'mgeni')->countAllResults();
    //     // $data['data'] = $set->where('set', 'kontena')->first();
    //     $data['total'] = $kont->countAllResults();
    //     $data['baki'] = $kont->where('paid<jumla')->countAllResults();
    //     $data['maliza'] = $kont->where(['paid=jumla', 'paid!=' => 0])->countAllResults();
    //     $data['box'] = $kont->selectSum('idadi')->get()->getRow()->idadi;
    //     // dd($data);

    //     return view('kontena/index', $data);
    // }

    // public function find()
    // {
    //     dd($this->request->getVar());
    //     helper('form');

    //     $kont = new Kontena();
    //     // $michango = new Michango();

    //     $iqama = $this->request->getVar('iqama');
    //     $password = $this->request->getVar('password');

    //     $query = $kont->where('iqama', $iqama)->first();
    //     // dd($query);

    //     if (!$query) {
    //         // dd('user not found');
    //         return redirect()->to('kontena')
    //         ->with('toast', 'error')
    //         ->with('message', 'Iqama hii haijasajiliwa kwenye Kontena Tafadhali Jisajili kwanza!');
    //     } else {
    //         $found = password_verify($password, $query['password']);
    //         if (!$found) {
    //             // dd('user not found');
    //             return redirect()->to('kontena')
    //             ->with('toast', 'warning')
    //             ->with('message', 'Password Imekosewa!');
    //         } else {
    //             $data['title'] = 'Kontena';
    //             // $data['data'] = $set->where('set', 'kontena')->first();
    //             $data['total'] = $kont->countAll();
    //             $data['baki'] = $kont->where('paid<jumla')->countAllResults();
    //             $data['maliza'] = $kont->where('paid=jumla')->countAllResults();
    //             $data['box'] = $kont->selectSum('idadi')->get()->getRow()->idadi;
    //             $data['kont'] = $query;
    //             // dd($data);

    //             return view('kontena/found', $data);
    //         }
    //     }
    // }

    // public function edited($id)
    // {
    //     // dd($this->request->getVar());
    //     helper(['form']);

    //     $kont = new Kontena();

    //     $leo = $this->request->getVar('leo');

    //     // Invoice 4mula
    //     $invc = $id . date('s');
    //     $invc = "KONT/" . date("m") . date("y") . "/" . sprintf('%06s', $invc);
    //     // dd($invc);

    //     $data = [
    //         'paid' => $this->request->getVar('paid') + (!empty($leo) ? $leo : 0),
    //         'risiti' => $invc,
    //     ];

    //     $ok = $kont->update($id, $data);
    //     if ($ok) {
    //         return redirect()->to('kontena')
    //         ->with('toast', 'success')
    //         ->with('message', 'Maelezo kuhusu Kontena yamesasishwa Kikamilifu!');
    //     }
    // }

    // public function check()
    // {
    //     dd($this->request->getVar());
    //     $kont = new Kontena();

    //     $data['title'] = 'Jisajili Kontena';
    //     $iqama = $this->request->getVar('iqama');
    //     $knt = $kont->where('iqama', $iqama)->first();
    //     // dd($knt);

    //     if (!$knt) {
    //         $data['iqama'] = $iqama;
    //         // $data['data'] = $set->where('set', 'kontena')->first();
    //         // dd($data);

    //         return view('kontena/register', $data);
    //     } else {
    //         return redirect()->to('kontena')
    //         ->with('toast', 'info')
    //         ->with('message', 'Tayari Umeshasajiliwa!\n Tafadhali weka  IQAMA na NAMBA YA SIMU ili kuangalia maelezo zaidi!');
    //     }
    // }

    // public function store()
    // {
    //     // dd($this->request->getVar());
    //     helper(['form']);

    //     $rules = [
    //         'iqama' => [
    //             'rules'  => 'required|is_unique[kontena.iqama]|integer',
    //             'errors' => [
    //                 'required' => 'Iqama Inahitajika!',
    //                 'integer' => 'Weka namba Tu!',
    //                 'is_unique' => 'Tayari Ushatuma Maombi!',
    //             ],
    //         ],
    //         'mhusika' => [
    //             'rules'  => 'required',
    //             'errors' => [
    //                 'required' => 'Mhusika Anahitajika!',
    //             ],
    //         ],
    //         'jamia' => [
    //             'rules'  => 'required',
    //             'errors' => [
    //                 'required' => 'Weka Chuo Unachotoka!',
    //             ],
    //         ],
    //         'idadi' => [
    //             'rules'  => 'required',
    //             'errors' => [
    //                 'required' => 'Weka Idadi ya Box!',
    //             ],
    //         ],
    //         'fikia' => [
    //             'rules'  => 'required',
    //             'errors' => [
    //                 'required' => 'Chagua Mafikio ya box zako!',
    //             ],
    //         ],
    //         'mpokeaji' => [
    //             'rules'  => 'required',
    //             'errors' => [
    //                 'required' => 'Weka Jina kamili la Mpokeaji!',
    //             ],
    //         ],
    //         'nchi' => [
    //             'rules'  => 'required',
    //             'errors' => [
    //                 'required' => 'Chagua Nchi yako!',
    //             ],
    //         ],
    //         'simu1' => [
    //             'rules'  => 'required|min_length[12]|max_length[12]',
    //             'errors' => [
    //                 'required' => 'Simu ya Mhusika Inahitajika!',
    //                 'max_length' => 'Namba zisizidi - {param}!',
    //                 'min_length' => 'Namba zisipungue - {param}!',
    //             ],
    //         ],
    //         'simu2' => [
    //             'rules'  => 'required|min_length[12]|max_length[12]',
    //             'errors' => [
    //                 'required' => 'Simu ya Mpokeaji Inahitajika!',
    //                 'max_length' => 'Namba zisizidi - {param}!',
    //                 'min_length' => 'Namba zisipungue - {param}!',
    //             ],
    //         ],
    //     ];

    //     if ($this->validate($rules)) {
    //         $kont = new Kontena();

    //         $data = [
    //             'iqama' => $this->request->getVar('iqama'),
    //             'password' => password_hash($this->request->getVar('simu1'), PASSWORD_DEFAULT),
    //             'mhusika' => strtoupper($this->request->getVar('mhusika')),
    //             'jamia' => $this->request->getVar('jamia'),
    //             'idadi' => $this->request->getVar('idadi'),
    //             'fikia' => $this->request->getVar('fikia'),
    //             'mpokeaji' => strtoupper($this->request->getVar('mpokeaji')),
    //             'nchi' => $this->request->getVar('nchi'),
    //             'simu1' => $this->request->getVar('simu1'),
    //             'simu2' => $this->request->getVar('simu2'),
    //             'simu3' => $this->request->getVar('simu3'),
    //             'jumla' => $this->request->getVar('amount') * $this->request->getVar('idadi'),
    //             'mwaka' => date('Y'),
    //         ];

    //         // dd($data);

    //         $ok = $kont->save($data);

    //         if ($ok) {
    //             return redirect()->to('kontena')
    //             ->with('toast', 'success')
    //             ->with('message', 'Umetuma Maombi ya Kontena Kikamilifu!');
    //         }
    //     } else {
    //         $data['title'] = 'Sajili Kontena';
    //         $data['validation'] = $this->validator->getErrors();
    //         // dd($data);

    //         return redirect()->back()->with('errors', $this->validator->getErrors())->withInput();
    //     }
    // }
}
