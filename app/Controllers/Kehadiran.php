<?php

namespace App\Controllers;

use App\Models\KehadiranModel;

class Kehadiran extends BaseController
{
   
    public function __construct()
    {
        $session = session();
        $data['username'] = $session->get('name');
        return view('/layouts/components/topbar_hr',$data);
    }
    public function index()
    {
        $model = new KehadiranModel();
        $data['kehadiran'] = $model->getKehadiran();
        return view('hr/kehadiran/kehadiran',$data);
    }


    public function Laporan()
    {
        $session = session();
        $kehadiran = new KehadiranModel();

        $data = [
            'title' => 'Laporan Data Kehadiran Karyawan',
            'kehadiran' => $kehadiran->laporanKehadiran()
        ];
        return view('hr/kehadiran/laporan', $data);
    }

    public function cetak()
    {
        $session = session();
        $kehadiran = new KehadiranModel();

        $data = [
            'title' => 'Laporan Data Kehadiran Karyawan',
            'kehadiran' => $kehadiran->laporanKehadiran()
        ];
        return view('hr/kehadiran/cetak', $data);
    }
}