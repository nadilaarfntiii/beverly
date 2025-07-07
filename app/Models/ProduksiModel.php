<?php

namespace App\Models;

use CodeIgniter\Model;

class ProduksiModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'tb_produksi';
    protected $primaryKey       = 'kode_produksi';
    // protected $useAutoIncrement = true;
    // protected $returnType       = 'array';
    // protected $useSoftDeletes   = false;
    // protected $protectFields    = false;
    protected $allowedFields    = ['kode_produksi','id_karyawan','tanggal_produksi', 'total_produksi', 'id_brg'];

    protected $validationRules      = [
        'kode_produksi'=> 'required',
        'id_karyawan'=> 'required',
        'tanggal_produksi'=> 'required',
        'total_produksi'=> 'required',
        'id_brg'=> 'required',
    ];

    protected $validationMessages   = [
        'kode_produksi' => [
            'required'=> 'kode produksi dibutuhkan',
        ],
        'id_karyawan' => [
            'required'=> 'id_karyawan dibutuhkan',
        ],
        'tanggal_produksi' => [
            'required'=> 'tanggal_produksi dibutuhkan',
        ],
        'total_produksi' => [
            'required'=> 'total_produksi dibutuhkan',
        ],
        'id_brg' => [
            'required'=> 'id_brg dibutuhkan',
        ],
    ];

    public function getProduksi($id = false)
    {
        if ($id == false) {
            return $this->findAll();
        } else {
            return $this->getWhere(['kode_produksi' => $id]);
        }
    }

    public function deleteProduksi($id)
    {
        return $this->delete(['kode_produksi' => $id]);
    }

    public function laporanProduksi()
    {
        return $this->table('produksi')
            ->select('kode_produksi, id_karyawan,tanggal_produksi, total_produksi, id_brg')
            ->orderBy('kode_produksi', 'ASC')
            ->get()->getResultArray();
    }
}
       