<?php

namespace App\Controllers;

use App\Models\PembelianModel;

class UnitGudang extends BaseController
{
    protected $db;
    public function __construct()
    {
        
        $this->db = \Config\Database::connect();
        /* $session = session();
        $data['nama'] = $session->get('nama');
        return view('/layouts/components/topbar',$data); */

    }

    public function index()
    {
        $pembelianModel = new PembelianModel();
        $session = session();
        $data['nama'] = $session->get('nama');
        $data['data'] = $pembelianModel->getAll(); // Mendapatkan semua data pembelian dari model

        // Menambahkan informasi nama berkas ke setiap item data
        foreach ($data['data'] as $item) {
            $item->nama_berkas = $this->getNamaBerkas($item->upload);
        }

        return view('keuangan/permintaan_gudang', $data);
    }

    protected function getNamaBerkas($filename)
    {
        // Mengembalikan URL berkas berdasarkan nama file
        return base_url('berkas/' . $filename);
    }

    public function disetujui($idpemb)
    {
        $idpemb = $this->db->escape($idpemb);
        $sql = "UPDATE gd_pembelian SET status='Disetujui' WHERE id_pemb={$idpemb}";
        $this->db->query($sql);
        session()->setFlashdata('message', '<div class="alert alert-success" role="alert"> Data Telah Disetujui 
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
        return redirect()->to('/unitgudang');
    }

    public function ditolak($idpemb)
    {
        $idpemb = $this->db->escape($idpemb);
        $sql = "UPDATE gd_pembelian SET status='Tidak Disetujui' WHERE id_pemb={$idpemb}";
        $this->db->query($sql);
        session()->setFlashdata('message', '<div class="alert alert-danger" role="alert"> Data Telah Ditolak 
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
        return redirect()->to('/unitgudang');
    }
}
