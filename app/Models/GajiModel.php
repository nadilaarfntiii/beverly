<?php

namespace App\Models;

use CodeIgniter\Model;

class GajiModel extends Model
{
    protected $table = 'tb_permintaan';
    protected $primaryKey = 'kode';
    protected $allowedFields = ['kode', 'tgl_permintaan', 'berkas', 'status', 'kd_gaji', 'id_user'];

    public function getGaji($kode = false)
    {
        if ($kode == false) {
            return $this->findAll();
        }

        return $this->where(['kode' => $kode])->first();
    }

    public function getAll()
    {
        return $this->db->table($this->table)
        ->select('*')
        ->join('tb_penggajian', 'tb_permintaan.kd_gaji=tb_penggajian.kd_gaji')
        ->join('user', 'tb_permintaan.id_user=user.id_user')
        ->get()->getResult();
    }

    public function disetujui($kode)
    {
        $this->db = \Config\Database::connect();  // Ensure $this->db is set
        $sql = "UPDATE tb_permintaan SET status='disetujui' WHERE kode=$kode";
        $this->db->query($sql);
        session()->setFlashdata('message', '<div class="alert alert-success" role="alert">  Data Telah Disetujui <button type="button" 
        class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
        return redirect()->to(site_url('permintaan_hr'));
    }

    public function ditolak($kode)
    {
        $this->db = \Config\Database::connect();  // Ensure $this->db is set
        $sql = "UPDATE tb_permintaan SET status='ditolak' WHERE kode=$kode";
        $this->db->query($sql);
        session()->setFlashdata('message', '<div class="alert alert-danger" role="alert">  Data Telah Ditolak <button type="button" 
        class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
        return redirect()->to(site_url('permintaan_hr'));
    }
}
