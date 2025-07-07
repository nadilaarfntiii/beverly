<?php

namespace App\Controllers;
use App\Models\PendapatanModel;
use App\Models\KategoriModel;
use App\Models\UserModel;
class Pendapatan extends BaseController
{
    public function __construct()
    {
        $session = session();
        $data['nama'] = $session->get('nama');
        return view('/layouts/components/topbar_keu',$data);
    }
    public function index()
    {
        $model = new PendapatanModel();
        $data['pendapatan'] = $model->getPendapatanWithDetails();

        return view('keuangan/pendapatan', $data);
    }
    

    public function pendapatan(){
        $pendapatan = new PendapatanModel();
        $session_lg = session();
        $data = [
            'id_transaksi' => $session_lg->get('id_transaksi'),
            'keterangan' => $pendapatan->findAll(),
        ];
        return view('keuangan/pendapatan', $data);
    }

    public function create()
    {
        $kategoriModel = new KategoriModel();
        $data['kategori'] = $kategoriModel->findAll();

        $userModel = new UserModel();
        $data['user'] = $userModel->findAll();

        return view('keuangan/pendapatan_create', $data);
    }

    public function store()
    {
        $pendapatanModel = new PendapatanModel();

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

            $pendapatanModel->insert($data);

            return redirect()->to('keuangan/pendapatan')->with('pesan', 'Data pendapatan berhasil ditambahkan.');
        }

        return redirect()->back()->withInput()->with('errors', 'File upload failed.');
    }



    public function ubah($id_transaksi)
    {
        $pendapatanModel = new PendapatanModel();
        $data['pendapatan'] = $pendapatanModel->find($id_transaksi);

        $kategoriModel = new KategoriModel();
        $data['kategori'] = $kategoriModel->findAll();

        $userModel = new UserModel();
        $data['user'] = $userModel->findAll();

        return view('keuangan/pendapatan_update', $data);
    }


    public function update($id_transaksi)
    {
        $model = new PendapatanModel();

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

            // Check if file with the same name exists and append number if necessary
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

        return redirect()->to('keuangan/pendapatan')->with('pesan', 'Data pendapatan berhasil diubah.');
    }


    public function delete($id_transaksi)
    {
        $pendapatanModel = new PendapatanModel();

        $pendapatanModel->deletePendapatan($id_transaksi);

        return redirect()->to('keuangan/pendapatan')->with('pesan', 'Data pendapatan berhasil dihapus');
    }

    public function getChartData()
    {
        $pendapatanModel = new PendapatanModel();
        $data = $pendapatanModel->getDataForChart(); 
        
        // Mengembalikan data dalam format JSON
        return $this->response->setJSON(['data' => $data]);
    }
}