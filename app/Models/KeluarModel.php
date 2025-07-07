<?php

namespace App\Models;

use CodeIgniter\Model;

class KeluarModel extends Model
{
    protected $table = 'gd_keluar'; // Nama tabel dalam database
    protected $primaryKey = 'id_brg_klr'; // Primary key tabel
    protected $allowedFields = ['id_brg_klr', 'id_brg','jumlah','tgl_klr'];

    public function getKeluar($id = false)
    {
        if ($id == false) {
            return $this->findAll();
        }

        return $this->where(['id_brg_klr' => $id])->first();
    }

    public function getAll($whr = null)
    {
        if ($whr) {
            return $this->db->table($this->table)
            ->select('*')
            ->like('tgl_klr', $whr, 'after')
            ->join('gd_stok', 'gd_keluar.id_brg=gd_stok.id_brg')
            ->get()->getResult();
        } else {
            return $this->db->table($this->table)
            ->select('*')
            ->join('gd_stok', 'gd_keluar.id_brg=gd_stok.id_brg')
            ->get()->getResult();
        }
    }
}