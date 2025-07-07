<?php

namespace App\Controllers;
use App\Models\PengeluaranModel;
use App\Models\KategoriModel;
use App\Models\UserModel;
class Pengeluaran extends BaseController
{
    public function __construct()
    {
        //mengakses sesi dan menyimpan data username ke dalam variabel $data, kemudian memuat tampilan topbar.
        $session = session();
        $data['nama'] = $session->get('nama');
        return view('/layouts/components/topbar_keu',$data);
    }
    public function index()
    {
        $model = new PengeluaranModel();
        $data['pengeluaran'] = $model->getPengeluaranWithDetails();

        // Menampilkan halaman pendapatan
        return view('keuangan/pengeluaran', $data);
    }

    public function pengeluaran(){
        $pengeluaran = new PengeluaranModel();
        $session_lg = session();
        $data = [
            'id_transaksi' => $session_lg->get('id_transaksi'),
            'keterangan' => $pengeluaran->findAll(),
        ];
        return view('keuangan/pengeluaran', $data);
    }

    public function create()
    {
        // Mengambil data kategori dari model
        $kategoriModel = new KategoriModel();
        $data['kategori'] = $kategoriModel->findAll();

        // Mengambil data user dari model
        $userModel = new UserModel();
        $data['user'] = $userModel->findAll();

        // Menampilkan view untuk membuat pengeluaran baru
        return view('keuangan/pengeluaran_create', $data);
    }

    public function store()
    {
        $pengeluaranModel = new PengeluaranModel();

        $file = $this->request->getFile('berkas');

        if ($file->isValid() && !$file->hasMoved()) {

            $originalName = $file->getName();
            $newName = $originalName;
            $path = 'berkas/' . $newName;

            $counter = 1;
            while (file_exists($path)) {
                $nameWithoutExtension = pathinfo($originalName, PATHINFO_FILENAME);
                $extension = pathinfo($originalName, PATHINFO_EXTENSION);
                $newName = $nameWithoutExtension . '_' . $counter . '.' . $extension;
                $path = 'berkas/' . $newName;
                $counter++;
            }

            $file->move('berkas', $newName);

        $data = [
            'id_transaksi' => $this->request->getPost('id_transaksi'),
            'tanggal' => $this->request->getPost('tanggal'),
            'keterangan' => $this->request->getPost('keterangan'),
            'nominal' => $this->request->getPost('nominal'),
            'id_kategori' => $this->request->getPost('id_kategori'),
            'berkas' => $newName,
            'id_user' => $this->request->getPost('id_user')
        ];

        $pengeluaranModel->insert($data);

        return redirect()->to('keuangan/pengeluaran')->with('pesan', 'Data pengeluaran berhasil ditambahkan.');
        }

        return redirect()->back()->withInput()->with('errors', 'File upload failed.');
    }

    public function ubah($id_transaksi)
    {
        $pengeluaranModel = new PengeluaranModel();
        $data['pengeluaran'] = $pengeluaranModel->find($id_transaksi);

        $kategoriModel = new KategoriModel();
        $data['kategori'] = $kategoriModel->findAll();

        $userModel = new UserModel();
        $data['user'] = $userModel->findAll();

        return view('keuangan/pengeluaran_update', $data);
    }

    public function update($id_transaksi)
    {
        $model = new PengeluaranModel();

        $validation = \Config\Services::validation();
        $validation->setRules([
            'tanggal' => 'required',
            'keterangan' => 'required',
            'nominal' => 'required|numeric',
            'berkas' => 'uploaded[berkas]|max_size[berkas,1024]|ext_in[berkas,pdf,doc,docx,xls,xlsx]',
        ]);

        if (!$validation->withRequest($this->request)->run()) {
            return redirect()->back()->withInput()->with('errors', $validation->getErrors());
            }

            $data = [
                'tanggal' => $this->request->getPost('tanggal'),
                'keterangan' => $this->request->getPost('keterangan'),
                'nominal' => $this->request->getPost('nominal'),
            ];

            $file = $this->request->getFile('berkas');
            if ($file->isValid() && !$file->hasMoved()) {

                $originalName = $file->getName();
                $newName = $originalName;
                $path = 'berkas/' . $newName;

                $counter = 1;
                while (file_exists($path)) {
                    $nameWithoutExtension = pathinfo($originalName, PATHINFO_FILENAME);
                    $extension = pathinfo($originalName, PATHINFO_EXTENSION);
                    $newName = $nameWithoutExtension . '_' . $counter . '.' . $extension;
                    $path = 'berkas/' . $newName;
                    $counter++;
                }

                $file->move('berkas', $newName);

                $data['berkas'] = $newName;
            }

            $model->update($id_transaksi, $data);

            return redirect()->to('keuangan/pengeluaran')->with('pesan', 'Data pengeluaran berhasil diubah.');
        }

    public function delete($id_transaksi)
    {
        $pengeluaranModel = new PengeluaranModel();

        $pengeluaranModel->deletePengeluaran($id_transaksi);

        return redirect()->to('keuangan/pengeluaran')->with('pesan', 'Data pengeluaran berhasil dihapus');
    }
}