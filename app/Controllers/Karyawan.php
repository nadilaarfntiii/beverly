<?php

namespace App\Controllers;

use App\Models\KaryawanModel;

class Karyawan extends BaseController
{
   
    public function __construct()
    {
        $session = session();
        $data['username'] = $session->get('name');
        return view('/layouts/components/topbar_hr',$data);
    }
    public function index()
    {
        $model = new KaryawanModel();
        $data['karyawan'] = $model->getKaryawan();
        return view('hr/karyawan/karyawan',$data);
    }

    public function create()
    {
        $KaryawanModel = new KaryawanModel();
        $lastid = $KaryawanModel->getLastId();
        $nextid = intval(substr($lastid,1)) +1;
        $nextid = "K" . str_pad($nextid, 10, '0',STR_PAD_LEFT);

        $data = [
            'id' =>  $nextid, 
        ];
        return view('hr/karyawan/create',$data);
    }

    public function store()
    {
        $model = new KaryawanModel();
        $validation = \Config\Services::validation();
        $validation->setRules([
            'nama' => 'required',
            'tgl_lahir' => 'required',
            'berkas' => 'uploaded[berkas]|max_size[berkas,1024]|ext_in[berkas,pdf,doc,docx,xls,xlsx]',
        ]);
    
        if (!$validation->withRequest($this->request)->run()) {
            return redirect()->back()->withInput()->with('errors', $validation->getErrors());
        }
    
        $file = $this->request->getFile('berkas');
        $newName = '';
    
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
        }
    
        $dataKaryawan = array(
            'id_karyawan' => $this->request->getPost('id'),
            'nama' => $this->request->getPost('nama'),
            'jekel' => $this->request->getPost('jekel'),
            'tgl_lahir' => $this->request->getPost('tgl_lahir'),
            'alamat' => $this->request->getPost('alamat'),
            'no_hp' => $this->request->getPost('no_hp'),
            'berkas' => $newName, // Save the new file name here
        );
    
        $simpan = $model->insert($dataKaryawan);
    
        return redirect()->to(base_url('karyawan'));
    }
    

    public function edit($id)
    {
        $model = new KaryawanModel();
        $data['karyawan'] = $model->getKaryawan($id)->getRowArray();
        echo view('hr/karyawan/edit', $data);
    }

    public function update($id)
    {
        $model = new KaryawanModel();

        $validation = \Config\Services::validation();
        $validation->setRules([
            'nama' => 'required',
            'tgl_lahir' => 'required',
            'berkas' => 'uploaded[berkas]|max_size[berkas,1024]|ext_in[berkas,pdf,doc,docx,xls,xlsx]',
        ]);

        if (!$validation->withRequest($this->request)->run()) {
            return redirect()->back()->withInput()->with('errors', $validation->getErrors());
        }
        $data = array(
            'id_karyawan'=> $this->request->getPost('id_karyawan'),
            'nama'=> $this->request->getPost('nama'),
            'jekel'=> $this->request->getPost('jekel'),
            'tgl_lahir'=> $this->request->getPost('tgl_lahir'),
            'alamat'=> $this->request->getPost('alamat'),
            'no_hp'=> $this->request->getPost('no_hp'),
            'berkas'=> $this->request->getPost('berkas'),
        );

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
            $ubah = $model->update($id, $data);

            return redirect()->to(base_url('karyawan'));
    }

         public function delete($id)
    {
        $model = new KaryawanModel();
        $hapus = $model->deleteKaryawan($id);
            return redirect()->to(base_url('karyawan'))->with('pesan', 'Data pendapatan berhasil dihapus');
        }
    

    public function Laporan()
    {
        $session = session();
        $karyawan = new KaryawanModel();

        $data = [
            'title' => 'Laporan Data Karyawan',
            'karyawan' => $karyawan->laporanKaryawan()
        ];
        return view('hr/karyawan/laporan', $data);
    }

    public function cetak()
    {
        $session = session();
        $karyawan = new KaryawanModel();

        $data = [
            'title' => 'Laporan Data Karyawan',
            'karyawan' => $karyawan->laporanKaryawan()
        ];
        return view('hr/karyawan/cetak', $data);
    }
}