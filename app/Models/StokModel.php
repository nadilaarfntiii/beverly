<?php

namespace App\Models;

use CodeIgniter\Model;

class StokModel extends Model
{
    protected $table = 'gd_stok';
    protected $primaryKey = 'id_brg';
    protected $allowedFields = ['id_brg', 'nm_brg', 'satuan', 'harga', 'stok'];

    public function getStok($idstok = false)
    {
        if ($idstok == false) {
            return $this->findAll();
        }

        return $this->where(['id_brg' => $idstok])->first();
    }

    
    // Menggunakan metode delete() untuk menghapus data pendapatan
    public function deleteStok($idstok)
    {
        return $this->where('id_brg', $idstok)->delete();
    }
}
