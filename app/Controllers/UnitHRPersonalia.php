<?php

namespace App\Controllers;

use App\Models\GajiModel;

class UnitHRPersonalia extends BaseController
{
    protected $db;

    public function __construct()
    {
        $this->db = \Config\Database::connect();
    }

    public function index()
    {
        $gajiModel = new GajiModel();
        $session = session();
        $data['nama'] = $session->get('nama');
        $data['data'] = $gajiModel->getAll(); 

        foreach ($data['data'] as $item) {
            $item->nama_berkas = $this->getNamaBerkas($item->berkas);
        }

        return view('keuangan/permintaan_hr', $data);
    }

    protected function getNamaBerkas($filename)
    {
        // Mengembalikan URL berkas berdasarkan nama file
        return base_url('berkas/' . $filename);
    }

    public function disetujui($kode)
    {
        $kode = $this->db->escape($kode);
        $sql = "UPDATE tb_permintaan SET status='Disetujui' WHERE kode={$kode}";
        $this->db->query($sql);
        session()->setFlashdata('message', '<div class="alert alert-success" role="alert"> Data Telah Disetujui 
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
        return redirect()->to('/unit_hr');
    }

    public function ditolak($kode)
    {
        $kode = $this->db->escape($kode);
        $sql = "UPDATE tb_permintaan SET status='Tidak Disetujui' WHERE kode={$kode}";
        $this->db->query($sql);
        session()->setFlashdata('message', '<div class="alert alert-danger" role="alert"> Data Telah Ditolak 
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
        return redirect()->to('/unit_hr');
    }
}
