<?php
namespace App\Models;

use CodeIgniter\Model;

class KehadiranModel extends Model
{
    protected $table = "tb_kehadiran";
    protected $primaryKey = "kd_absen";
    protected $allowedFields = ['kd_absen','nm_krywn','jam_masuk','jam_pulang','tanggal','id_karyawan'];
   

    public function getKehadiran($id = false)
    {
        if ($id == false) {
            return $this->findAll();
        } else {
            return $this->getWhere(['kd_absen' => $id]);
        }
    }

    public function laporanKehadiran()
    {
        return $this->table('kehadiran')
            ->select('kd_absen, nm_krywn, jam_masuk,jam_pulang, tanggal, id_karyawan')
            ->orderBy('kd_absen', 'ASC')
            ->get()->getResultArray();
    }
}
?>