<?php

namespace App\Controllers;
use App\Models\UserModel;
use App\Models\KategoriModel;
use App\Models\PendapatanModel;
use App\Models\PengeluaranModel;
use App\Models\KeuanganModel;
class Home extends BaseController
{

    public function index(): string
    {
        helper(['form']);
        return view('login');
    }
    
    /* public function dashboard_k()
    {
        $session_lg = session();
        $pendapatanModel = new PendapatanModel();
        $pengeluaranModel = new PengeluaranModel();
        $keuanganModel = new KeuanganModel();

        $modalAwalRow = $keuanganModel->select('modal_awal')->orderBy('tanggal', 'DESC')->first();
        $modalAwalValue = $modalAwalRow !== null ? $modalAwalRow['modal_awal'] : 0;
        $formattedModalAwal = 'Rp ' . number_format($modalAwalValue);

        $totalPendapatanBulanIni = $pendapatanModel->getTotalPendapatanBulanIni();

        $totalPengeluaranBulanIni = $pengeluaranModel->getTotalPengeluaranBulanIni();

        $dataPendapatanPerBulan = $pendapatanModel->getPendapatanPerBulan();

        $data = [
            'nama' => $session_lg->get('nama'),
            'totalpend_bulan_ini' => $totalPendapatanBulanIni,
            'totalpeng_bulan_ini' => $totalPengeluaranBulanIni,
            'modal_awal' => $formattedModalAwal,
            'data_pendapatan_bulan' => $dataPendapatanPerBulan,
        ];

        return view('keuangan/dashboard_k', $data);
    } */
    

    /* public function dashboard_g()
    {
        $session_lg = session();
        $data = [
            'nama' => $session_lg->get('nama'),
        ];
        return view('gudang/dashboard_g', $data);
    }

    public function dashboard_p()
        {
            $session_lg = session();
            $data = [
                'nama' => $session_lg->get('nama'),
            ];
            return view('produksi/dashboard_p', $data);
        }

    public function dashboard_h()
    {
        $session_lg = session();
        $data = [
            'nama' => $session_lg->get('nama'),
        ];
        return view('hr/dashboard_h', $data);
    } */

    public function dashboard_k()
{
    $session_lg = session();
    if (!$session_lg->get('logged_in')) {
        return redirect()->to('/')->with('error', 'Silakan login terlebih dahulu.');
    }

    $pendapatanModel = new PendapatanModel();
    $pengeluaranModel = new PengeluaranModel();
    $keuanganModel = new KeuanganModel();

    $modalAwalRow = $keuanganModel->select('modal_awal')->orderBy('tanggal', 'DESC')->first();
    $modalAwalValue = $modalAwalRow !== null ? $modalAwalRow['modal_awal'] : 0;
    $formattedModalAwal = 'Rp ' . number_format($modalAwalValue);

    $totalPendapatanBulanIni = $pendapatanModel->getTotalPendapatanBulanIni();
    $totalPengeluaranBulanIni = $pengeluaranModel->getTotalPengeluaranBulanIni();
    $dataPendapatanPerBulan = $pendapatanModel->getPendapatanPerBulan();

    $data = [
        'nama' => $session_lg->get('nama'),
        'totalpend_bulan_ini' => $totalPendapatanBulanIni,
        'totalpeng_bulan_ini' => $totalPengeluaranBulanIni,
        'modal_awal' => $formattedModalAwal,
        'data_pendapatan_bulan' => $dataPendapatanPerBulan,
    ];

    return view('keuangan/dashboard_k', $data);
}

public function dashboard_g()
{
    $session_lg = session();
    if (!$session_lg->get('logged_in')) {
        return redirect()->to('/')->with('error', 'Silakan login terlebih dahulu.');
    }

    $data = [
        'nama' => $session_lg->get('nama'),
    ];
    return view('gudang/dashboard_g', $data);
}

public function dashboard_p()
{
    $session_lg = session();
    if (!$session_lg->get('logged_in')) {
        return redirect()->to('/')->with('error', 'Silakan login terlebih dahulu.');
    }

    $data = [
        'nama' => $session_lg->get('nama'),
    ];
    return view('produksi/dashboard_p', $data);
}

public function dashboard_h()
{
    $session_lg = session();
    if (!$session_lg->get('logged_in')) {
        return redirect()->to('/')->with('error', 'Silakan login terlebih dahulu.');
    }

    $data = [
        'nama' => $session_lg->get('nama'),
    ];
    return view('hr/dashboard_h', $data);
}

    public function validasi()
{
    helper(['form']);
    $session_lg = session();
    $val_user = new UserModel();

    $id_user = $this->request->getVar('id_user');
    $password = $this->request->getVar('password');
    $bagian = $this->request->getVar('bagian');

    // Mengambil data pengguna berdasarkan id_user
    $data = $val_user->where('id_user', $id_user)->first();

    if ($data) {
        // Data pengguna ditemukan
        if (password_verify($password, $data['password'])) {
            // Password cocok
            if ($data['bagian'] === $bagian) {
                // Bagian cocok
                $ses_data = [
                    'id_user' => $data['id_user'],
                    'nama' => $data['nama'],
                    'bagian' => $data['bagian'],
                    'logged_in' => true
                ];
                $session_lg->set($ses_data);

                // Redirect berdasarkan bagian
                switch ($data['bagian']) {
                    case 'Keuangan':
                        return redirect()->to('/dashboard_k');
                    case 'Gudang':
                        return redirect()->to('/dashboard_g');
                    case 'Produksi':
                        return redirect()->to('/dashboard_p');
                    case 'HR Personalia':
                        return redirect()->to('/dashboard_h');
                    default:
                        return redirect()->to('/');
                }
            } else {
                // Bagian tidak cocok
                return redirect()->to('/')->with('error', 'Mohon maaf anda tidak memiliki hak akses untuk login');
            }
        } else {
            // Password tidak cocok
            return redirect()->to('/')->with('error', 'Username atau Password salah, silakan input ulang');
        }
    } else {
        // Data pengguna tidak ditemukan
        return redirect()->to('/')->with('error', 'Username atau Password salah, silakan input ulang');
    }
}


    


    public function logout_ac(){

        $session_lg = session();
        $session_lg->destroy();
        return redirect()->to('/');

    }

    public function tables_db(){
        $val_user = new UserModel();
        $session_lg = session();
        $data = [
            'nama' => $session_lg->get('first_name'),
            'dt_user' => $val_user->findAll(),
        ];
        return view('tables', $data);
    }

    public function dt_user(){
        $val_user = new UserModel();
        $data = $val_user->findAll();
        return json_encode($data);
    }

    public function kategori(){
        $kategori = new KategoriModel();
        $session_lg = session();
        $data = [
            'id_kategori' => $session_lg->get('id_kategori'),
            'nm_kategori' => $kategori->findAll(),
        ];
        return view('kategori', $data);
    }

    public function modal()
    {
        return view('modal_awal'); 
    }

    public function getChartData()
    {
        $pendapatanModel = new PendapatanModel();
        $data = $pendapatanModel->getDataForChart(); // Misalnya ada method getDataForChart() untuk mengambil data pendapatan
        
        // Mengembalikan data dalam format JSON
        return $this->response->setJSON(['data' => $data]);
    }
}

