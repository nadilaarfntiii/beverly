<?php

namespace App\Controllers;

use App\Models\PengajuanModel;

class Pengajuan extends BaseController
{
   
    public function __construct()
    {
        $session = session();
        $data['username'] = $session->get('name');
        return view('/layouts/components/topbar_pr',$data);
    }
    
    public function index()
    {
        $model = new PengajuanModel();
        $data['pengajuan'] = $model->getPengajuan();
        return view('produksi/pengajuan/pengajuan',$data);
    }

    public function create()
    {
        return view('produksi/pengajuan/create');
    }

    public function store()
    {

        $dataPengajuan = array(
            'id_brg' => $this->request->getPost('id_brg'),
            'nama_produk' => $this->request->getPost('nama_produk'),
            'jumlah' => $this->request->getPost('jumlah'),
            'tanggal_pengajuan' => $this->request->getPost('tanggal_pengajuan'),
        );

        $model = new PengajuanModel();
        $simpan = $model->insert($dataPengajuan);
        
        return redirect()->to(base_url('pengajuan'));
    }
}