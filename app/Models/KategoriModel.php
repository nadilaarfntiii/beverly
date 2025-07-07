<?php

namespace App\Models;

use CodeIgniter\Model;

class KategoriModel extends Model
{
    protected $table = 'tb_kategori'; // Nama tabel dalam database
    protected $primaryKey = 'id_kategori'; // Primary key tabel
    protected $allowedFields = ['id_kategori','nm_kategori'];

    public function getKategori($idkategori = false)
    {
        if ($idkategori == false) {
            return $this->findAll();
        }

        return $this->where(['id_kategori' => $idkategori])->first();
    }

    public function deleteKategori($idkategori)
    {
        return $this->db->table($this->table)->delete(['id_kategori' => $idkategori]);
    }
}
