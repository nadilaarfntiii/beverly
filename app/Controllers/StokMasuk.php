<?php

namespace App\Controllers;

use App\Models\StokMasukModel;

class StokMasuk extends BaseController
{
   
    public function __construct()
    {
        $session = session();
        $data['username'] = $session->get('name');
        return view('/layouts/components/topbar_pr',$data);
    }
    public function index()
    {
        $model = new StokMasukModel();
        $data['stokMasuk'] = $model->getStokMasuk();
        return view('produksi/stokMasuk/stokMasuk',$data);
    }

    public function create()
    {
        return view('produksi/stokMasuk/create');
    }

    public function store()
    {

        $dataStok = array(
            'id_brg' => $this->request->getPost('id_brg'),
            'jumlah' => $this->request->getPost('jumlah'),
            'tanggal_masuk' => $this->request->getPost('tanggal_masuk'),
        );

        $model = new StokMasukModel();
        $simpan = $model->insert($dataStok);
        
        return redirect()->to(base_url('stokMasuk'));
        
    }

}