<?php

namespace App\Controllers;
use App\Models\StokModel;
use App\Models\MasukModel;
use App\Models\KeluarModel;
use App\Models\PembelianModel;

class Stok extends BaseController
{
    protected $stokModel;
    public function __construct()
    {
        $this->stokModel = new StokModel();
        $session = session();
        $data['nama'] = $session->get('nama');
        // return view('/layouts/components/topbar',$data);
    }
    public function index()
    {
        $this->stokModel = new StokModel(); 
         $session_lg = session();

        $data = [
            'title' => 'Data Stok', 
            'stok' => $this->stokModel->getStok(),
            'nama' => $session_lg->get('nama'),
        ];


        return view('gudang/stok',$data);
    }

    public function stok(){
        $stok = new StokModel();
        $session_lg = session();
        $data = [
            'id_brg' => $session_lg->get('id_brg'),
            'nm_brg' => $stok->findAll(),
        ];
        return view('/stok', $data);
    }

    public function create()
    {
     $session_lg = session();
        $data = [
            'title' => 'Data Stok', 
            'nama' => $session_lg->get('nama'),
        ];
        return view('gudang/stok-create.php', $data);
    }

    public function store()
    {
        $model = new StokModel();

        $data = [
            'id_brg' => $this->request->getPost('id_brg'),
            'nm_brg' => $this->request->getPost('nm_brg'),
            'satuan' => $this->request->getPost('satuan'),
            'harga' => $this->request->getPost('harga'),
            'stok' => $this->request->getPost('stok'),
        ];

        $model->insert($data);

        // Set pesan sukses
        session()->setFlashdata('pesan', 'Stok berhasil ditambahkan');

        return redirect()->to('/stok');
    }

    public function edit($idstok)
    {
        $model = new StokModel();
        $session_lg = session();
        $data = [
            'nama' => $session_lg->get('nama'),
        ];
        $data['stok'] = $model->find($idstok);

        return view('gudang/stok-edit', $data);
    }

    public function update($idstok)
    {
        $data = [
            // 'id_brg' => $this->request->getPost('id_brg'),
            'nm_brg' => $this->request->getPost('nm_brg'),
            'satuan' => $this->request->getPost('satuan'),
            'harga' => $this->request->getPost('harga'),
            'stok' => $this->request->getPost('stok'),
        ];

        $this->stokModel->update($idstok, $data);

        // Set pesan sukses
        session()->setFlashdata('pesan', 'Data Stok berhasil diperbarui.');

        // Alihkan kembali pengguna ke halaman kategori
        return redirect()->to('/stok');
    }

     public function destroy($idstok)
    {
        $pembelian = new PembelianModel();
        $masuk = new MasukModel();
        $keluar = new KeluarModel();

        $masuk->where('id_brg', $idstok)->delete();
        $keluar->where('id_brg', $idstok)->delete();
        $pembelian->where('id_brg', $idstok)->delete();
        $this->stokModel->delete($idstok);

        // Set pesan sukses
        session()->setFlashdata('pesan', 'Data Stok berhasil dihapus.');

        // Alihkan kembali pengguna ke halaman kategori
        return redirect()->to('/stok');
    }


    public function laporan()
    {
        $session = session();
        $data['stok'] = $session->get('stok') ?? [];
        return view('stok/laporan', $data); // Pastikan $data['stok'] telah diinisialisasi
    }
    
}