<?php

namespace App\Models;

use CodeIgniter\Model;

class PengajuanModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'tb_pengajuan';
    protected $primaryKey       = 'id_brg';
    // protected $useAutoIncrement = true;
    // protected $returnType       = 'array';
    // protected $useSoftDeletes   = false;
    // protected $protectFields    = false;
    protected $allowedFields    = ['id_brg','nama_produk','jumlah', 'tanggal_pengajuan'];

    protected $validationRules      = [
        'id_brg'=> 'required',
        'nama_produk'=> 'required',
        'jumlah'=> 'required',
        'tanggal_pengajuan'=> 'required',
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
        'tanggal_pengajuan' => [
            'required'=> 'tanggal pengajuan dibutuhkan',
        ],
    ];

    public function getPengajuan($id = false)
    {
        if ($id == false) {
            return $this->findAll();
        } else {
            return $this->getWhere(['id_brg' => $id]);
        }
    }

    public function laporanPengajuan()
    {
        return $this->table('tb_pengajuan')
            ->select('id_brg, nama_produk, jumlah,tanggal_pengajuan')
            ->orderBy('id_brg', 'ASC')
            ->get()->getResultArray();
    }

}
       