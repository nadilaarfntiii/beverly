<?php

namespace App\Controllers;
use App\Models\KategoriModel;
class Kategori extends BaseController
{
    protected $kategoriModel;
    public function __construct()
    {
        $this->kategoriModel = new KategoriModel();
        $session = session();
        $data['nama'] = $session->get('nama');
        return view('/layouts/components/topbar_keu',$data);
    }
    public function index()
    {
        $this->KategoriModel = new KategoriModel(); 
        $data = [
            'title' => 'Data Kategori', 
            'kategori' => $this->KategoriModel->getKategori() 
        ];
        return view('keuangan/kategori',$data);
    }

    public function kategori(){
        $kategori = new KategoriModel();
        $session_lg = session();
        $data = [
            'id_kategori' => $session_lg->get('id_kategori'),
            'nm_kategori' => $kategori->findAll(),
        ];
        return view('keuangan/kategori', $data);
    }

    public function create()
    {
        return view('keuangan/kategori_create');
    }

    public function store()
    {
        $model = new KategoriModel();

        $data = [
            'id_kategori' => $this->request->getPost('id_kategori'),
            'nm_kategori' => $this->request->getPost('nm_kategori'),
        ];

        $model->insert($data);

        return redirect()->to('keuangan/kategori');
    }

    public function ubah($id_kategori)
    {
        $model = new KategoriModel();
        $data['kategori'] = $model->find($id_kategori);

        return view('keuangan/kategori_update', $data);
    }

    public function update($id_kategori)
    {
        $model = new KategoriModel();
        // Validasi input
        $validation = \Config\Services::validation();
        $validation->setRules([
            'id_kategori' => 'required',
            'nm_kategori' => 'required',
        ]);

        if (!$validation->withRequest($this->request)->run()) {
            return redirect()->back()->withInput()->with('errors', $validation->getErrors());
        }

        // Proses pembaruan data kategori
        $data = [
            'id_kategori' => $this->request->getPost('id_kategori'),
            'nm_kategori' => $this->request->getPost('nm_kategori'),
        ];

        $model->update($id_kategori, $data);

        return redirect()->to('keuangan/kategori')->with('pesan', 'Data kategori berhasil diubah.');
    }

    public function delete($id_kategori)
    {
        $kategoriModel = new KategoriModel();

        $kategoriModel->deleteKategori($id_kategori);

        return redirect()->to('keuangan/kategori')->with('pesan', 'Data kategori berhasil dihapus');
    }
}