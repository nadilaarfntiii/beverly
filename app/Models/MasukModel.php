<?php

namespace App\Models;

use CodeIgniter\Model;

class MasukModel extends Model
{
    protected $table = 'gd_masuk'; // Nama tabel dalam database
    protected $primaryKey = 'id_brg_msk'; // Primary key tabel
    protected $allowedFields = ['id_brg_msk', 'id_brg','jumlah','tgl_msk'];

    public function getMasuk($idbarangmasuk = false)
    {
        if ($idbarangmasuk == false) {
            return $this->findAll();
        }

        return $this->where(['id_brg_msk' => $idbarangmasuk])->first();
    }

    public function deleteMasuk($idbarangmasuk)
    {
        return $this->db->table($this->table)->delete(['id_brg_msk' => $idbarangmasuk]);
    }

    public function getAll($whr = null)
    {   
        if ($whr) {
            return $this->db->table($this->table)
            ->select('*')
            ->like('tgl_msk', $whr, 'after')
            ->join('gd_stok', 'gd_masuk.id_brg=gd_stok.id_brg')
            ->get()->getResult();
        } else {
            return $this->db->table($this->table)
            ->select('*')
            ->join('gd_stok', 'gd_masuk.id_brg=gd_stok.id_brg')
            ->get()->getResult();
        }
    }

    
}