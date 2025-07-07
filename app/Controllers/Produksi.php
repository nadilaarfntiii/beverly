<?php

namespace App\Controllers;

use App\Models\ProduksiModel;

class Produksi extends BaseController
{
   
    public function __construct()
    {
        $session = session();
        $data['username'] = $session->get('name');
        return view('/layouts/components/topbar_pr',$data);
    }
    public function index()
    {
        $model = new ProduksiModel();
        $data['produksi'] = $model->getProduksi();
        return view('produksi/produksi/produksi',$data);
    }

    public function produksiKaryawan()
    {
        $model = new ProduksiModel();
        $data['produksi'] = $model->getProduksi();
        return view('produksi/produksi/produksiKaryawan',$data);
    }

    public function create()
    {
        return view('produksi/produksi/create');
    }

    public function ajukanStok()
    {
        return view('produksi/produksi/ajukanStok');
    }

    public function stok()
    {
        return view('produksi/produksi/stok');
    }

    public function store()
    {

        $dataProduksi = array(
            'kode_produksi' => $this->request->getPost('kode_produksi'),
            'id_karyawan' => $this->request->getPost('id_karyawan'),
            'tanggal_produksi' => $this->request->getPost('tanggal_produksi'),
            'total_produksi' => $this->request->getPost('total_produksi'),
            'id_brg' => $this->request->getPost('id_brg'),
        );

        $model = new ProduksiModel();
        $simpan = $model->insert($dataProduksi);
        
        return redirect()->to(base_url('produksi'));
        
    }

    public function edit($id)
    {
        $model = new ProduksiModel();
        $data['produksi'] = $model->getProduksi($id)->getRowArray();
        echo view('produksi/produksi/edit', $data);
    }

    public function update($id)
    {

        $data = array(
            'id_karyawan'=> $this->request->getPost('id_karyawan'),
            'tanggal_produksi'=> $this->request->getPost('tanggal_produksi'),
            'total_produksi'=> $this->request->getPost('total_produksi'),
            'id_brg'=> $this->request->getPost('id_brg'),
        );
            $model = new ProduksiModel();
            $ubah = $model->update($id, $data);

            return redirect()->to(base_url('produksi'));
    }

    public function delete($id)
    {
        $model = new ProduksiModel();
        $hapus = $model->deleteProduksi($id);
        if ($hapus) {
            session()->setFlashdata('warning', 'Deleted successfully');
            return redirect()->to(base_url('produksi'));
        }
    }
/* 
    public function Laporan()
    {
        $session = session();
        $produksi = new ProduksiModel();

        $data = [
            'title' => 'Laporan Produksi',
            'produksi' => $produksi->laporanProduksi()
        ];
        return view('produksi/laporan', $data);
    }

    public function cetak()
    {
        $session = session();
        $produksi = new ProduksiModel();

        $data = [
            'title' => 'Laporan Data Produksi',
            'produksi' => $produksi->laporanProduksi()
        ];
        return view('produksi/cetak', $data);
    } */
}