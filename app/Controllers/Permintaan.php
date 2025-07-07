<?php

namespace App\Controllers;

use App\Models\PermintaanModel;
use App\Models\PenggajianModel;
use App\Models\UserModel;

class Permintaan extends BaseController
{
   
    public function __construct()
    {
        $session = session();
        $data['username'] = $session->get('name');
        return view('/layouts/components/topbar_hr',$data);
    }
    /* public function index()
    {
        $model = new PermintaanModel();
        $data['permintaan'] = $model->getPermintaan();
        return view('hr/permintaan/permintaan',$data);
    } */

    public function index()
    {
        $model = new PermintaanModel();
        $session = session();
        $data['nama'] = $session->get('nama');
        $data['permintaan'] = $model->getAll(); 

        return view('hr/permintaan/permintaan', $data);
    }

    public function create()
    {
        $gajiModel = new PenggajianModel();
        $userModel = new UserModel();

        $data = [
            'gaji' => $gajiModel->findAll(),
            'user' => $userModel->findAll(),
        ];

        return view('hr/permintaan/create', $data);
    }

    public function store()
    {
        $model = new PermintaanModel();

        $validation = \Config\Services::validation();
        $validation->setRules([
            'kode' => 'required',
            'tgl_permintaan' => 'required',
            'berkas' => 'uploaded[berkas]|max_size[berkas,1024]|ext_in[berkas,pdf,doc,docx,xls,xlsx]',
            'kd_gaji' => 'required',
            'id_user' => 'required',
        ]);

        if (!$validation->withRequest($this->request)->run()) {
            return redirect()->back()->withInput()->with('errors', $validation->getErrors());
        }

        $dataPermintaan = [
            'kode' => $this->request->getPost('kode'),
            'tgl_permintaan' => $this->request->getPost('tgl_permintaan'),
            'kd_gaji' => $this->request->getPost('kd_gaji'),
            'id_user' => $this->request->getPost('id_user'),
            'status' => 'Menunggu',
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
            $dataPermintaan['berkas'] = $newName;
        }

        $model->insert($dataPermintaan);

        return redirect()->to(base_url('permintaan'));
    }


    // public function store()
    // {
    //     $model = new PermintaanModel();

    //     $validation = \Config\Services::validation();
    //     $validation->setRules([
    //         'tgl_permintaan' => 'required',
    //         'berkas' => 'uploaded[berkas]|max_size[berkas,1024]|ext_in[berkas,pdf,doc,docx,xls,xlsx]',
    //         'status' => 'required',
    //     ]);

    //     if (!$validation->withRequest($this->request)->run()) {
    //         return redirect()->back()->withInput()->with('errors', $validation->getErrors());
    //     }

    //     $dataPermintaan = array(
    //         'kode' => $this->request->getPost('kode'),
    //         'tgl_permintaan' => $this->request->getPost('tgl_permintaan'),
    //         'status' => $this->request->getPost('status'),
           
    //     );

    //     $file = $this->request->getFile('berkas');
    //     if ($file->isValid() && !$file->hasMoved()) {

    //         $originalName = $file->getName();
    //         $newName = $originalName;
    //         $path = 'berkas/' . $newName;

    //         // Check if file with the same name exists and append number if necessary
    //         $counter = 1;
    //         while (file_exists($path)) {
    //             $nameWithoutExtension = pathinfo($originalName, PATHINFO_FILENAME);
    //             $extension = pathinfo($originalName, PATHINFO_EXTENSION);
    //             $newName = $nameWithoutExtension . '_' . $counter . '.' . $extension;
    //             $path = 'berkas/' . $newName;
    //             $counter++;
    //         }

    //         $file->move('berkas', $newName);

    //         $data['berkas'] = $newName;
    //     } 
       
    //     $simpan = $model->insert($dataPermintaan);
        
    //     return redirect()->to(base_url('permintaan'));
        
    // }

    public function edit($id)
{
    $model = new PermintaanModel();
    $gajiModel = new PenggajianModel();
    $userModel = new UserModel();

    $data['permintaan'] = $model->getPermintaan($id);
    $data['gaji'] = $gajiModel->findAll();
    $data['user'] = $userModel->findAll();

    return view('hr/permintaan/edit', $data);
}

public function update($id)
{
    $model = new PermintaanModel();

    $validation = \Config\Services::validation();
    $validation->setRules([
        'tgl_permintaan' => 'required',
        'berkas' => 'uploaded[berkas]|max_size[berkas,1024]|ext_in[berkas,pdf,doc,docx,xls,xlsx]',
        'kd_gaji' => 'required',
        'id_user' => 'required',
    ]);

    if (!$validation->withRequest($this->request)->run()) {
        return redirect()->back()->withInput()->with('errors', $validation->getErrors());
    }

    $data = [
        'tgl_permintaan' => $this->request->getPost('tgl_permintaan'),
        'kd_gaji' => $this->request->getPost('kd_gaji'),
        'id_user' => $this->request->getPost('id_user'),
        'status' => $this->request->getPost('status'), // Biarkan status sesuai input form
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
    } else {
        $data['berkas'] = $this->request->getPost('berkas');
    }

    $ubah = $model->update($id, $data);

    return redirect()->to(base_url('permintaan'));
}

         public function delete($id)
    {
        $model = new PermintaanModel();
        $hapus = $model->deletePermintaan($id);
            return redirect()->to(base_url('permintaan'))->with('pesan', 'Data pendapatan berhasil dihapus');
        }
    

    public function Laporan()
    {
        $session = session();
        $permintaan = new PermintaanModel();

        $data = [
            'title' => 'Laporan Data Gaji Karyawan',
            'permintaan' => $permintaan->laporanPermintaan()
        ];
        return view('hr/permintaan/laporan', $data);
    }

    public function cetak()
    {
        $session = session();
        $permintaan = new PermintaanModel();

        $data = [
            'title' => 'Laporan Data Gaji Karyawan',
            'permintaan' => $permintaan->laporanPermintaan()
        ];
        return view('hr/permintaan/cetak', $data);
    }
}