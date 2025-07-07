<?php
namespace App\Models;

use CodeIgniter\Model;

class PenggajiannModel extends Model
{
    protected $table = "tb_penggajian";
    protected $primaryKey = "kd_gaji";
    protected $allowedFields = ['kd_gaji','tanggal','nm_krywn','gaji','tunjangan','total','kd_absen','id_karyawan'];
   

    // public function getPenggajian($id = false)
    // {
    //     if ($id == false) {
    //         return $this->findAll();
    //     } else {
    //         return $this->getWhere(['kd_gaji' => $id]);
    //     }
    // }
    public function getPenggajian($id = null)
    {
        if ($id === null) {
            return $this->select('tb_penggajian.*, tb_karyawan.nama as nm_krywn')
                        ->join('tb_karyawan', 'tb_karyawan.id_karyawan = tb_penggajian.id_karyawan')
                        ->findAll();
        } else {
            return $this->select('tb_penggajian.*, tb_karyawan.nama as nm_krywn')
                        ->join('tb_karyawan', 'tb_karyawan.id_karyawan = tb_penggajian.id_karyawan')
                        ->where('kd_gaji', $id)
                        ->first();
        }
    }

    public function deletePenggajian($id)
    {
        return $this->where('kd_gaji',$id)->delete();
    }

    public function laporanPenggajian()
    {
        return $this->table('penggajian')
            ->select('kd_gaji, tanggal, nm_krywn,gaji, tunjangan, total, kd_absen, id_karyawan')
            ->orderBy('kd_gaji', 'ASC')
            ->get()->getResultArray();
    }
}
?>