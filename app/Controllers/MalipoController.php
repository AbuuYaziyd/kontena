<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Data;
use App\Models\User;

class MalipoController extends BaseController
{
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
        $data['chenji'] = $dt->where(['user_id' => $id, 'paid>' => 0, 'paid<' => session('price')])->first()['paid'] ?? 0;
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
                $data = [
                    'paid' => session('price'),
                    'mhasibu_id' => session('id'),
                    ];

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
}
