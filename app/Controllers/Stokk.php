<?php

namespace App\Controllers;

use App\Models\StokkModel;

class Stokk extends BaseController
{
   
    public function __construct()
    {
        $session = session();
        $data['username'] = $session->get('name');
        return view('/layouts/components/topbar_pr',$data);
    }
    public function stok_real()
    {
        $model = new StokkModel();
        $data['stok'] = $model->getStok();
        return view('produksi/stok/stok_real',$data);
    }

    public function create()
    {
        return view('produksi/stok/create');
    }

    public function store()
    {

        $dataStok = array(
            'id_brg' => $this->request->getPost('id_brg'),
            'nama_produk' => $this->request->getPost('nama_produk'),
            'jumlah' => $this->request->getPost('jumlah'),
        );

        $model = new StokkModel();
        $simpan = $model->insert($dataStok);
        
        return redirect()->to(base_url('stok'));
        
    }

}