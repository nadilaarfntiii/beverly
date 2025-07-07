<?php

namespace App\Models;

use CodeIgniter\Model;

class PenggajianModel extends Model
{
    protected $table = 'tb_penggajian'; 
    protected $primaryKey = 'kd_gaji'; 
    protected $allowedFields = ['kd_gaji','tanggal','nm_krywn','gaji','tunjangan','total','kd_absen','id_karyawan'];

    public function getPenggajian($kdgaji = false)
    {
        if ($kdgaji == false) {
            return $this->findAll();
        }
        return $this->where(['kd_gaji' => $kdgaji])->first();
    }
}
