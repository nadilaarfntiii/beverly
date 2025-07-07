<?php

namespace App\Controllers;

use App\Models\PembeliannModel;
use App\Models\StokModel;
use App\Models\UserModel;

class pembelian extends BaseController
{
    public function index()
    {
        $pembelianModel = new PembeliannModel();
        $session_lg = session();
        $data = [
            'nama' => $session_lg->get('nama'),
        ];

        $data['data'] = $pembelianModel->getAll();

        return view('gudang/pembelian', $data);
        
    }

    public function create()
    {
        $this->stokModel = new StokModel(); 
        $userModel = new UserModel();
        $session_lg = session();
        $data = [
            'nama' => $session_lg->get('nama'),
            'barang' => $this->stokModel->getStok(),
            'user' => $userModel->findAll(),
        ];

        return view('gudang/pembelian-create', $data);
    }

    public function success()
    {
        $session_lg = session();
        $data = [
            'nama' => $session_lg->get('nama'),
        ];
        return view('gudang/pembelian-success', $data);
    }

    public function store()
    {
        $data = [
            'id_pemb' => $this->request->getPost('id_pemb'),
            'id_brg' => $this->request->getPost('id_brg'),
            'id_user' => $this->request->getPost('id_user'),
            'qty' => $this->request->getPost('qty'),
            'tgl_pemb' => $this->request->getPost('tgl_pemb'),
            'upload' => $this->request->getPost('upload'),
            // 'status' => $this->request->getPost('status'),
            'status' => "Menunggu",
        ];

        $pembelianModel = new PembeliannModel();
        $cek = $pembelianModel->find($data["id_pemb"]);

        if ($cek) {
            session()->setFlashdata('error', 'ID Pembelian Tidak Boleh Sama');
            return redirect()->to('/pembelian/create');
        }

        session()->setFlashdata('pesan', 'Data Pembelian berhasil ditambahkan');

        // Simpan data ke database
        $pembelianModel->insert($data);
        /* return redirect()->to('/pembelian'); */
        return redirect()->to('/pembelian/success');
    }

   /*  public function keteranganPembelian()
    {
        return view('/ket_pembelian');
    } */


    public function edit($id)
    {
        $session_lg = session();
        $pembelian = new PembeliannModel();
        $this->stokModel = new StokModel(); 
        $userModel = new UserModel();

        $data = [
            'nama' => $session_lg->get('nama'),
            'barang' => $this->stokModel->getStok(),
            'user' => $userModel->findAll(),
            'pembelian' => $pembelian->find($id),
        ];        

        return view('gudang/pembelian-edit', $data);
    }

    public function update($id)
    {
        $data = [
            'id_pemb' => $this->request->getPost('id_pemb'),
            'id_brg' => $this->request->getPost('id_brg'),
            'id_user' => $this->request->getPost('id_user'),
            'jumlah' => $this->request->getPost('jumlah'),
            'tgl_pemb' => $this->request->getPost('tgl_pemb'),
            'upload' => $this->request->getPost('upload'),
            'status' => $this->request->getPost('status'),
        ];

        $pembelianModel = new PembeliannModel();

        session()->setFlashdata('pesan', 'Data Pembelian berhasil diperbarui');

        $pembelianModel->update($id, $data);

        return redirect()->to('/pembelian');
    }

     public function destroy($id)
    {
        $pembelianModel = new PembeliannModel();
        $pembelianModel->delete($id);

        session()->setFlashdata('pesan', 'Pembelian berhasil dihapus.');

        return redirect()->to('/pembelian');
    }

    public function upload($id){

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // Direktori tujuan untuk menyimpan file yang diunggah
            $target_dir = "uploads/";
            $target_file = $target_dir . basename($_FILES["berkas"]["name"]);
            $uploadOk = 1;
            $fileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
        
            // Periksa apakah file adalah file PDF
            if ($fileType != "pdf") {
                echo "Maaf, hanya file PDF yang diperbolehkan.";
                $uploadOk = 0;
            }
        
            // Periksa apakah file sudah ada
            if (file_exists($target_file)) {
                echo "Maaf, file sudah ada.";
                $uploadOk = 0;
            }
        
            // Periksa ukuran file
            if ($_FILES["berkas"]["size"] > 5000000) { // 5MB
                echo "Maaf, file terlalu besar.";
                $uploadOk = 0;
            }
        
            // Periksa apakah $uploadOk bernilai 0 karena kesalahan
            if ($uploadOk == 0) {
                echo "Maaf, file Anda tidak dapat diunggah.";
            // Jika semua pemeriksaan lulus, coba unggah file
            } else {
                if (move_uploaded_file($_FILES["berkas"]["tmp_name"], $target_file)) {
                    echo "File ". htmlspecialchars(basename($_FILES["berkas"]["name"])) . " telah berhasil diunggah.";
                } else {
                    echo "Maaf, terjadi kesalahan saat mengunggah file Anda.";
                }
            }
        }
    }
        
        
    }

    

