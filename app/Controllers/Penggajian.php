<?php

namespace App\Controllers;

use App\Models\PenggajiannModel;
use App\Models\KaryawanModel;

class Penggajian extends BaseController
{
   
    public function __construct()
    {
        $session = session();
        $data['username'] = $session->get('name');
        return view('/layouts/components/topbar_hr',$data);
    }
    public function index()
    {
        $model = new PenggajiannModel();
        $data['penggajian'] = $model->getPenggajian();
        return view('hr/penggajian/penggajian',$data);
    }

    public function create()
    {
        $karyawanModel = new KaryawanModel();
        $data['karyawan'] = $karyawanModel->findAll();
        return view('hr/penggajian/create', $data);
        // return view('penggajian/create');
    }

    public function store()
    {

        $karyawanModel = new KaryawanModel();
        $id_karyawan = $this->request->getPost('id_karyawan');
        $karyawan = $karyawanModel->find($id_karyawan);

        if (!$karyawan) {
            return redirect()->back()->withInput()->with('errors', 'Karyawan tidak ditemukan');
        }

        $dataPenggajian = [
            'kd_gaji' => $this->request->getPost('kd_gaji'),
            'tanggal' => $this->request->getPost('tanggal'),
            'id_karyawan' => $id_karyawan,
            'nm_krywn' => $karyawan['nama'],
            'gaji' => $this->request->getPost('gaji'),
            'tunjangan' => $this->request->getPost('tunjangan'),
            'total' => $this->request->getPost('total'),
        ];

        $model = new PenggajiannModel();
        $simpan = $model->insert($dataPenggajian);
        return redirect()->to(base_url('penggajian'));
        
    }

    public function edit($id)
    {
        $model = new PenggajiannModel();
        $karyawanModel = new KaryawanModel();
        $data['penggajian'] = $model->getPenggajian($id);
        $data['karyawan'] = $karyawanModel->findAll();
        return view('hr/penggajian/edit', $data);
    }

    public function update($id)
    {
        $karyawanModel = new KaryawanModel();
        $id_karyawan = $this->request->getPost('id_karyawan');
        $karyawan = $karyawanModel->find($id_karyawan);

        if (!$karyawan) {
            return redirect()->back()->withInput()->with('errors', 'Karyawan tidak ditemukan');
        }
        $data = array(
            'kd_gaji' => $this->request->getPost('kd_gaji'),
            'tanggal' => $this->request->getPost('tanggal'),
            'id_karyawan' => $id_karyawan,
            'nm_krywn' => $karyawan['nama'],
            'gaji' => $this->request->getPost('gaji'),
            'tunjangan' => $this->request->getPost('tunjangan'),
            'total' => $this->request->getPost('totalbaru'),
            
        );
            $model = new PenggajiannModel();
            $ubah = $model->update($id, $data);
            return redirect()->to(base_url('penggajian'));

    }

    public function delete($id)
    {
        $model = new PenggajiannModel();
        $hapus = $model->deletePenggajian($id);
        if ($hapus) {
            session()->setFlashdata('warning', 'Deleted successfully');
            return redirect()->to(base_url('penggajian'));
        }
    }

    public function Laporan()
    {
        $session = session();
        $penggajian = new PenggajiannModel();

        $data = [
            'title' => 'Laporan Data Penggajian',
            'penggajian' => $penggajian->laporanPenggajian()
        ];
        return view('hr/penggajian/laporan', $data);
    }

    public function cetak()
    {
        $session = session();
        $penggajian = new PenggajiannModel();

        $data = [
            'title' => 'Laporan Data Penggajian',
            'penggajian' => $penggajian->laporanPenggajian()
        ];
        return view('hr/penggajian/cetak', $data);
    }
}