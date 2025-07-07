<?php

namespace App\Models;

use CodeIgniter\Model;

class StokkModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'pd_stok';
    protected $primaryKey       = 'id_brg';
    // protected $useAutoIncrement = true;
    // protected $returnType       = 'array';
    // protected $useSoftDeletes   = false;
    // protected $protectFields    = false;
    protected $allowedFields    = ['id_brg','nama_produk','jumlah'];

    protected $validationRules      = [
        'id_brg'=> 'required',
        'nama_produk'=> 'required',
        'jumlah'=> 'required',
    ];

    protected $validationMessages   = [
        'id_brg' => [
            'required'=> 'id_brg produk dibutuhkan',
        ],
        'nama_produk' => [
            'required'=> 'nama produk dibutuhkan',
        ],
        'jumlah' => [
            'required'=> 'jumlah dibutuhkan',
        ],
    ];

    public function getStok($id = false)
    {
        if ($id == false) {
            return $this->findAll();
        } else {
            return $this->getWhere(['id_brg' => $id]);
        }
    }

    public function laporanStok()
    {
        return $this->table('pd_stok')
            ->select('id_brg, nama_produk, jumlah')
            ->orderBy('id_brg', 'ASC')
            ->get()->getResultArray();
    }
}
       