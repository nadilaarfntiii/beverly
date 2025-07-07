<?php

namespace App\Controllers;

use App\Models\MasukModel;
use App\Models\StokModel;

class masuk extends BaseController
{
    public function index()
    {
        $masukModel = new MasukModel();
        $session_lg = session();
        $data = [
            'nama' => $session_lg->get('nama'),
        ];
        $data['data'] = $masukModel->getAll();

        return view('gudang/masuk', $data);
    }

    public function create()
    {
        $this->stokModel = new StokModel(); 
        $session_lg = session();
        $data = [
            'nama' => $session_lg->get('nama'),
            'barang' => $this->stokModel->getStok(),
        ];

        // Ketika barang masuk, stok bertambah

        return view('gudang/masuk-create', $data);
    }

    public function store()
    {
        $masukModel = new MasukModel();
        $stokModel = new StokModel();

        $data = [
            'id_brg_msk' => $this->request->getPost('id_brg_msk'),
            'id_brg' => $this->request->getPost('id_brg'),
            'jumlah' => $this->request->getPost('jumlah'),
            'tgl_msk' => $this->request->getPost('tanggal'),
        ];


        session()->setFlashdata('pesan', 'Barang Masuk berhasil ditambahkan');

        // Simpan data ke database
        $masukModel->insert($data);

        $id_brg = $data["id_brg"];
        $jumlah_masuk = $data["jumlah"];
        $barang = $stokModel->getStok($id_brg);
        $jumlah_baru = $jumlah_masuk + $barang["stok"];
        $stokModel->update($id_brg, ["stok" => $jumlah_baru]);

        // Redirect ke halaman utama setelah berhasil menyimpan
        return redirect()->to('/barang_masuk');
    }


    public function edit($id)
    {
        $session_lg = session();
        $model = new MasukModel();
        $this->stokModel = new StokModel(); 

        $data = [
            'nama' => $session_lg->get('nama'),
            'barang' => $this->stokModel->getStok(),
            'masuk' => $model->find($id),
        ];        

        return view('gudang/masuk-edit', $data);
    }

    public function update($id)
    {
        $data = [
            'id_brg_msk' => $this->request->getPost('id_brg_msk'),
            'id_brg' => $this->request->getPost('id_brg'),
            'jumlah' => $this->request->getPost('jumlah'),
            'tgl_msk' => $this->request->getPost('tanggal'),
        ];

        $masukModel = new MasukModel();
        $stokModel = new StokModel();


        $id_brg = $data["id_brg"];
        $barang = $stokModel->getStok($id_brg);
        $stok_barang = $barang["stok"];
        $barang_masuk = $masukModel->getMasuk($id);

        $jumlah_masuk_lama = $barang_masuk["jumlah"];
        $jumlah_masuk_baru = $data["jumlah"];
        $jumlah_baru = $stok_barang - $jumlah_masuk_lama + $jumlah_masuk_baru;

        $masukModel->update($id, $data);
        $stokModel->update($id_brg, ["stok" => $jumlah_baru]);

        // Set pesan sukses
        session()->setFlashdata('pesan', 'Data Barang Masuk berhasil diperbarui.');

        // Alihkan kembali pengguna ke halaman kategori
        return redirect()->to('/barang_masuk');
    }

     public function destroy($id)
    {
        $masukModel = new MasukModel();
        $stokModel = new StokModel();

        $barang_masuk = $masukModel->getMasuk($id);
        $jumlah_masuk_lama = $barang_masuk["jumlah"];

        $id_brg = $barang_masuk["id_brg"];
        $barang = $stokModel->getStok($id_brg);
        $stok_barang = $barang["stok"];

        $jumlah_baru = $stok_barang - $jumlah_masuk_lama;

        $stokModel->update($id_brg, ["stok" => $jumlah_baru]);

        $masukModel->delete($id);

        session()->setFlashdata('pesan', 'Data Barang Masuk berhasil dihapus.');

        return redirect()->to('/barang_masuk');
    }

    public function notifikasi($id){
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Ambil data yang di-submit dari form
            $nama_barang = $_POST['nama_barang'];
        
            // Simpan proses input barang ke dalam database di sini
            // Misalnya, menggunakan koneksi ke database dan query INSERT
        
            // Dummy code untuk simulasi penyimpanan data
            $query = true; // simulasi berhasil
            if ($query) {
                // Jika penyimpanan berhasil, kirim notifikasi
                kirimNotifikasi("Barang \"$nama_barang\" berhasil ditambahkan ke dalam sistem!");
            }
        }
        
        // Fungsi untuk mengirim notifikasi
        function kirimNotifikasi($pesan) {
            // Di sini Anda bisa menambahkan logika untuk mengirim notifikasi,
            // misalnya menggunakan email, SMS, atau push notification ke aplikasi gudang.
        
            // Dummy code untuk simulasi notifikasi
            // Tulis notifikasi ke file log
            file_put_contents('logs/notifikasi.log', date('Y-m-d H:i:s') . ' - ' . $pesan . "\n", FILE_APPEND);
        }
        
        // Redirect kembali ke halaman input_barang setelah selesai proses
        header("Location: input_barang.php");
        exit();    

    }
    
}
