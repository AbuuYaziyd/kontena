<?php

namespace App\Models;

use CodeIgniter\Model;

class Data extends Model
{
    protected $table            = 'data';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = [
        'user_id',
        'kontena_id',
        'mpokeaji',
        'phone',
        'fikia',
        'paid',
        'code',
    ];

    protected bool $allowEmptyInserts = false;
    protected bool $updateOnlyChanged = true;

    protected array $casts = [];
    protected array $castHandlers = [];

    // Dates
    protected $useTimestamps = false;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    // Validation
    protected $validationRules      = [];
    protected $validationMessages   = [];
    protected $skipValidation       = false;
    protected $cleanValidationRules = true;

    // Callbacks
    protected $allowCallbacks = true;
    protected $beforeInsert   = [];
    protected $afterInsert    = [];
    protected $beforeUpdate   = [];
    protected $afterUpdate    = [];
    protected $beforeFind     = [];
    protected $afterFind      = [];
    protected $beforeDelete   = [];
    protected $afterDelete    = [];

    function user($id)
    {
        $usr = new User();
        $user = $usr->find($id);
        return $user;
    }

    function wanaohitajia($id)
    {
        $dt = new Data();
        $data = $dt->where('kontena_id', $id)->countAllResults();
        return $data;
    }

    function waliomaliza($id)
    {
        $dt = new Data();

        $data = $dt->where(['paid' => session('price'), 'kontena_id' => $id])->countAllResults();
        return $data;
    }

    function boxZote($id)
    {
        $dt = new Data();
        $data = $dt->where('kontena_id', $id)->countAllResults();
        return $data;
    }

    function box($id, $user)
    {
        $dt = new Data();
        $data = $dt->where(['kontena_id' => $id, 'user_id' => $user])->countAllResults();
        return $data;
    }

    function code($id, $user)
    {
        $dt = new Data();
        
        $fk = $dt->find($id);
        $query = $dt->where('user_id', $user)->orderBy('id', 'asc')->first()['code'];

        $m = ($fk['fikia'] == 'DAR' ? 1 : ($fk['fikia'] == 'ZNZ' ? 2 : 3));

        if ($query != null) {
            $code = substr($query, 1);
            $code = $code + 1;
            $code = $m . sprintf('%03s', $code);
        } else {
            $code = $m . sprintf('%03s', 1);
        }

        return $code;
    }

    function kontena($id)
    {
        $knt = new Kontena();
        $kt = $knt->find($id);
        return $kt;
    }
}
