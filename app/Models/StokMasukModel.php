<?php

namespace App\Models;

use CodeIgniter\Model;

class StokMasukModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'pd_stok_masuk';
    protected $primaryKey       = 'id_brg';
    // protected $useAutoIncrement = true;
    // protected $returnType       = 'array';
    // protected $useSoftDeletes   = false;
    // protected $protectFields    = false;
    protected $allowedFields    = ['id_brg','jumlah','tanggal_masuk'];

    protected $validationRules      = [
        'id_brg'=> 'required',
        'jumlah'=> 'required',
        'tanggal_masuk' => 'required',
    ];

    protected $validationMessages   = [
        'id_brg' => [
            'required'=> 'id_brg produk dibutuhkan',
        ],
        'jumlah' => [
            'required'=> 'jumlah dibutuhkan',
        ],
        'tanggal_masuk' => [
            'required'=> 'tanggal_masuk dibutuhkan',
        ],
    ];

    public function getStokMasuk($id = false)
    {
        if ($id == false) {
            return $this->findAll();
        } else {
            return $this->getWhere(['id_brg' => $id]);
        }
    }

    public function laporanMasuk()
    {
        return $this->table('pd_stok_masuk')
            ->select('id_brg, jumlah,tanggal_masuk')
            ->orderBy('id_brg', 'ASC')
            ->get()->getResultArray();
    }
}
       