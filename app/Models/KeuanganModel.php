<?php

namespace App\Models;

use CodeIgniter\Model;

class KeuanganModel extends Model
{
    protected $table = 'tb_keuangan';
    protected $primaryKey = 'id'; // Sesuaikan dengan nama primary key di tabel tb_keuangan
    protected $allowedFields = ['tanggal', 'modal_awal', 'saldo_saat_ini']; // Sesuaikan dengan nama kolom di tabel tb_keuangan

    public function getLatestModalAwal()
    {
        // Ambil data dengan modal_awal terbaru berdasarkan tanggal terbaru
        return $this->orderBy('tanggal', 'DESC')->first();
    }

    /* public function updateModalAwal($id, $data)
    {
        $this->update($id, $data);
    } */
}
