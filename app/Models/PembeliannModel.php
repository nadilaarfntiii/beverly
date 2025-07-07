<?php

namespace App\Models;

use CodeIgniter\Model;

class PembeliannModel extends Model
{
    protected $table = 'gd_pembelian'; // Nama tabel dalam database
    protected $primaryKey = 'id_pemb'; // Primary key tabel
    protected $allowedFields = ['id_pemb', 'id_brg','id_user','qty','tgl_pemb','upload','status'];

    public function getPembelian($idpembelian = false)
    {
        if ($idpembelian == false) {
            return $this->findAll();
        }

        return $this->where(['id_pemb' => $idpembelian])->first();
    }

    public function deletePembelian($idpembelian)
    {
        return $this->db->table($this->table)->delete(['id_pemb' => $idpembelian]);
    }

    public function getAll($whr = null)
    {
        if ($whr) {
            return $this->db->table($this->table)
            ->select('*')
            ->like('tgl_pemb', $whr, 'after')
            ->join('gd_stok', 'gd_pembelian.id_brg=gd_stok.id_brg')
            ->join('user', 'gd_pembelian.id_user=user.id_user')
            ->get()->getResult();
        }
        return $this->db->table($this->table)
        ->select('*')
        ->join('gd_stok', 'gd_pembelian.id_brg=gd_stok.id_brg')
        ->join('user', 'gd_pembelian.id_user=user.id_user')
        ->get()->getResult();
    }
}
