<?php

namespace App\Controllers;

use App\Models\KeluarModel;
use App\Models\StokModel;

class Keluar extends BaseController
{
    public function index()
    {
        $keluarModel = new KeluarModel();
        $session_lg = session();
        $data = [
            'nama' => $session_lg->get('nama'),
        ];
        $data['data'] = $keluarModel->getAll();

        return view('gudang/keluar', $data);
    }

    public function create()
    {
        $this->stokModel = new StokModel(); 
        $session_lg = session();
        $data = [
            'nama' => $session_lg->get('nama'),
            'barang' => $this->stokModel->getStok(),
        ];

        return view('gudang/keluar-create', $data);
    }

    public function store()
    {
        $keluarModel = new KeluarModel();
        $stokModel = new StokModel();

        $data = [
            'id_brg_klr' => $this->request->getPost('id_brg_klr'),
            'id_brg' => $this->request->getPost('id_brg'),
            'jumlah' => $this->request->getPost('jumlah'),
            'tgl_klr' => $this->request->getPost('tanggal'),
        ];

        session()->setFlashdata('pesan', 'Barang Keluar berhasil ditambahkan');

        // Simpan data ke database
        $keluarModel->insert($data);

        $id_brg = $data["id_brg"];
        $jumlah_keluar = $data["jumlah"];
        $barang = $stokModel->getStok($id_brg);
        $jumlah_baru = $barang["stok"] - $jumlah_keluar;
        $stokModel->update($id_brg, ["stok" => $jumlah_baru]);

        // Redirect ke halaman utama setelah berhasil menyimpan
        return redirect()->to('/barang_keluar');
    }


    public function edit($id)
    {
        $session_lg = session();
        $model = new KeluarModel();
        $this->stokModel = new StokModel(); 

        $data = [
            'nama' => $session_lg->get('nama'),
            'barang' => $this->stokModel->getStok(),
            'keluar' => $model->find($id),
        ];        

        return view('gudang/keluar-edit', $data);
    }

    public function update($id)
    {
        $data = [
            'id_brg_msk' => $this->request->getPost('id_brg_msk'),
            'id_brg' => $this->request->getPost('id_brg'),
            'jumlah' => $this->request->getPost('jumlah'),
            'tgl_klr' => $this->request->getPost('tanggal'),
        ];

        $keluarModel = new KeluarModel();
        $stokModel = new StokModel();


        $id_brg = $data["id_brg"];
        $barang = $stokModel->getStok($id_brg);
        $stok_barang = $barang["stok"];
        $barang_keluar = $keluarModel->getKeluar($id);

        $jumlah_keluar_lama = $barang_keluar["jumlah"];
        $jumlah_keluar_baru = $data["jumlah"];
        $jumlah_baru = $stok_barang + $jumlah_keluar_lama - $jumlah_keluar_baru;

        $keluarModel->update($id, $data);
        $stokModel->update($id_brg, ["stok" => $jumlah_baru]);

        // Set pesan sukses
        session()->setFlashdata('pesan', 'Data Barang Keluar berhasil diperbarui.');

        // Alihkan kembali pengguna ke halaman kategori
        return redirect()->to('/barang_keluar');
    }

     public function destroy($id)
    {
        $keluarModel = new KeluarModel();
        $stokModel = new StokModel();

        $barang_keluar = $keluarModel->getKeluar($id);
        $jumlah_keluar_lama = $barang_keluar["jumlah"];

        $id_brg = $barang_keluar["id_brg"];
        $barang = $stokModel->getStok($id_brg);
        $stok_barang = $barang["stok"];

        $jumlah_baru = $stok_barang + $jumlah_keluar_lama;

        $stokModel->update($id_brg, ["stok" => $jumlah_baru]);

        $keluarModel->delete($id);

        session()->setFlashdata('pesan', 'Data Barang Keluar berhasil dihapus.');

        return redirect()->to('/barang_keluar');
    }

    
}
