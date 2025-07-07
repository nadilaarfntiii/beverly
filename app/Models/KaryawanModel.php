<?php
namespace App\Models;

use CodeIgniter\Model;

class KaryawanModel extends Model
{
    protected $table = "tb_karyawan";
    protected $primaryKey = "id_karyawan";
    protected $allowedFields = ['id_karyawan','nama','jekel','tgl_lahir','alamat','no_hp','berkas','id_user'];
   

    public function getKaryawan($id = false)
    {
        if ($id == false) {
            return $this->findAll();
        } else {
            return $this->getWhere(['id_karyawan' => $id]);
        }
    }

    public function getLastId()
    {
       $query = $this->select('id_karyawan')->orderBy('id_karyawan','DESC')->first();
       return ($query) ? $query ['id_karyawan'] : 0;
    }

    public function deleteKaryawan($id)
    {
        return $this->where('id_karyawan',$id)->delete();
    }

    public function laporanKaryawan()
    {
        return $this->table('karyawan')
            ->select('id_karyawan, nama, jekel,tgl_lahir, alamat, no_hp, id_user')
            ->orderBy('id_karyawan', 'ASC')
            ->get()->getResultArray();
    }
}
?>