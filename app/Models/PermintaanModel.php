<?php
namespace App\Models;

use CodeIgniter\Model;

class PermintaanModel extends Model
{
    protected $table = "tb_permintaan";
    protected $primaryKey = "kode";
    protected $allowedFields = ['kode','tgl_permintaan','berkas','status','kd_gaji','id_user'];

    public function getPermintaan($id = false)
    {
        if ($id == false) {
            return $this->findAll();
        }

        return $this->where(['kode' => $id])->first();
    }

    public function getAll()
    {
        return $this->db->table($this->table)
        ->select('*')
        ->join('tb_penggajian', 'tb_permintaan.kd_gaji=tb_penggajian.kd_gaji')
        ->join('user', 'tb_permintaan.id_user=user.id_user')
        ->get()->getResult();
    }

    public function deletePermintaan($id)
    {
        return $this->where('kode',$id)->delete();
    }

    public function laporanPermintaan()
    {
        return $this->table('permintaan')
            ->select('kode, tgl_permintaan, berkas, status, kd_gaji, id_user')
            ->orderBy('kode', 'ASC')
            ->get()->getResultArray();
    }
}
?>