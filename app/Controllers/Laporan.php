<?php

namespace App\Controllers;

use Dompdf\Dompdf;
use Dompdf\Options;
use App\Models\LaporanModel;
use App\Models\PendapatanModel;
use App\Models\PengeluaranModel;
use App\Models\StokModel;
use App\Models\MasukModel;
use App\Models\KeluarModel;
use App\Models\PembeliannModel;
use App\Models\ProduksiModel;
use App\Models\PengajuanModel;
use App\Models\StokMasukModel;
use App\Models\StokkModel;

helper(['custom_helper']);

class Laporan extends BaseController
{
    protected $session;
    protected $nama;

    public function __construct()
    {
        $this->stokModel = new StokModel();
        $this->session = session();
        $this->nama = $this->session->get('nama');
    }

// pendapatan

    public function pendapatan()
    {
        $model = new PendapatanModel();
        $data = [
            'title' => 'Laporan Pembelian',
            'laporanPendapatan' => $model->getPendapatanWithDetails(),
            'nama' => $this->nama, // Pastikan variabel $nama tersedia
        ];
        return view('laporan/pendapatan/lap_pend', $data);
    }

    public function createLaporanPend()
    {
        $model = new PendapatanModel();
        $data = [
            'title' => 'Buat Laporan Pendapatan',
            'laporanPendapatan' => $model->getPendapatanWithDetails(),
            'nama' => $this->nama,
        ];
        return view('laporan/pendapatan/createLaporanPend', $data);
    }

    public function laporan_pendapatan()
    {
        $model = new PendapatanModel();
        $keyword = $this->request->getVar('search');
        $data = [
            'title' => 'Laporan Pendapatan',
            'laporanPendapatan' => $model->laporanperBulan($keyword),
            'nama' => $this->nama,
            'bulan' => $keyword
        ];
        return view('laporan/pendapatan/laporan_pendapatan', $data);
    }

    public function cetak_pendapatan()
    {
        $model = new PendapatanModel();
        $bulan = $this->request->getVar('bulan');

        $data = [
            'title' => 'Laporan Pendapatan Bulan',
            'laporanPendapatan' => $model->laporanperBulan($bulan),
            'nama' => $this->nama,
            'bulan' => $bulan
        ];
        return view('laporan/pendapatan/cetak_pend', $data);
    }

//pengeluaran

    public function pengeluaran()
    {
        $model = new PengeluaranModel();
        $data = [
            'title' => 'Laporan Pengeluaran',
            'laporanPengeluaran' => $model->getPengeluaranWithDetails(),
            'nama' => $this->nama, // Pastikan variabel $nama tersedia
        ];
        return view('laporan/pengeluaran/lap_peng', $data);
    }

    public function createLaporanPeng()
    {
        $model = new PengeluaranModel();
        $data = [
            'title' => 'Buat Laporan Pengeluaran',
            'laporanPengeluaran' => $model->getPengeluaranWithDetails(),
            'nama' => $this->nama,
        ];
        return view('laporan/pengeluaran/createLaporanPeng', $data);
    }

    public function laporan_pengeluaran()
    {
        $model = new PengeluaranModel();
        $keyword = $this->request->getVar('search');
        $data = [
            'title' => 'Laporan Pengeluaran',
            'laporanPengeluaran' => $model->laporanperBulan($keyword),
            'nama' => $this->nama,
            'bulan' => $keyword
        ];
        return view('laporan/pengeluaran/laporan_pengeluaran', $data);
    }

    public function cetak_pengeluaran()
    {
        $model = new PengeluaranModel();
        $bulan = $this->request->getVar('bulan');

        $data = [
            'title' => 'Laporan Pengeluaran Bulan',
            'laporanPengeluaran' => $model->laporanperBulan($bulan),
            'nama' => $this->nama,
            'bulan' => $bulan
        ];
        return view('laporan/pengeluaran/cetak_peng', $data);
    }

// stok

    public function stok()
    {
        $data = [
            'title' => 'Laporan Data Stok', 
            'stok' => $this->stokModel->getStok(),
            'nama' => $this->session->get('nama'),
        ];
        return view('laporan/stok/laporan_stok', $data);
    }

    public function stok_cetak()
    {
        $data = [
            'title' => 'Laporan Data Stok', 
            'stok' => $this->stokModel->getStok(),
            'nama' => $this->session->get('nama'),
        ];
        return view('laporan/stok/cetak_stok', $data);
    }

// barang masuk

    public function barang_masuk()
    {
        $masukModel = new MasukModel();
        $session_lg = session();
        $data = [
            'nama' => $session_lg->get('nama'),
        ];
        $data['data'] = $masukModel->getAll();

        return view('laporan/barangmasuk/laporan_masuk', $data);
    }

    public function barang_masuk_cetak()
    {
        $bln = $this->request->getVar('bln');
        $thn = $this->request->getVar('thn');
        $whr = "$thn-$bln-%";

        $masukModel = new MasukModel();
        $session_lg = session();
        $data = [
            'nama' => $session_lg->get('nama'),
        ];

        $data['data'] = $masukModel->getAll($whr);

        if (!count($data["data"])) {

            session()->setFlashdata('pesan', 'Data Kosong');
            header('location: /laporan/barang_masuk');
            die;
        }


        return view('laporan/barangmasuk/cetak_masuk', $data);
    }

// barang keluar

    public function barang_keluar()
    {

        $keluarModel = new KeluarModel();
        $session_lg = session();
        $data = [
            'nama' => $session_lg->get('nama'),
        ];
        $data['data'] = $keluarModel->getAll();

        return view('laporan/barangkeluar/laporan_keluar', $data);
    }

    public function barang_keluar_cetak()
    {
        $bln = $this->request->getVar('bln');
        $thn = $this->request->getVar('thn');
        $whr = "$thn-$bln-%";

        $keluarModel = new KeluarModel();
        $session_lg = session();
        $data = [
            'nama' => $session_lg->get('nama'),
        ];

        $data['data'] = $keluarModel->getAll($whr);

        if (!count($data["data"])) {

            session()->setFlashdata('pesan', 'Data Kosong');
            header('location: /laporan/barang_keluar');
            die;
        }

        return view('laporan/barangkeluar/cetak_keluar', $data);
    }

// pembelian

    public function pembelian()
    {
        $pembelianModel = new PembeliannModel();
        $session_lg = session();
        $data = [
            'nama' => $session_lg->get('nama'),
        ];

        $data['data'] = $pembelianModel->getAll();

        return view('laporan/pembelian/laporan_pembelian', $data);
    }

    public function pembelian_cetak()
    {
        $bln = $this->request->getVar('bln');
        $thn = $this->request->getVar('thn');
        $whr = "$thn-$bln-%";

        $pembelianModel = new PembeliannModel();
        $session_lg = session();
        $data = [
            'nama' => $session_lg->get('nama'),
        ];

        $data['data'] = $pembelianModel->getAll($whr);
        if (!count($data["data"])) {

            session()->setFlashdata('pesan', 'Data Kosong');
            header('location: /laporan/pembelian');
            die;
        }

        return view('laporan/pembelian/cetak_pembelian', $data);
    }

    public function create()
    {
        return view('laporan/create');
    }

    public function store()
    {
        $session = session();
        $laporan = $session->get('laporan') ?? [];
        
        $newData = [
            'id_laporan' => count($laporan) + 1,
            'nm_brg' => $this->request->getPost('nm_brg'),
            'stok' => $this->request->getPost('stok'),
            'barang_masuk' => $this->request->getPost('barang_masuk'),
            'barang_keluar' => $this->request->getPost('barang_keluar')
        ];

        $laporan[] = $newData;
        $session->set('laporan', $laporan);

        session()->setFlashdata('pesan', 'Data berhasil ditambahkan.');
        return redirect()->to('/');
    }

    public function edit($id)
    {
        $session = session();
        $laporan = $session->get('laporan') ?? [];
        $data['barang'] = array_filter($laporan, function ($item) use ($id) {
            return $item['id_laporan'] == $id;
        });
        $data['barang'] = reset($data['barang']); // Mengambil data pertama dari hasil filter
        return view('laporan/edit', $data);
    }

    public function update($id)
    {
        $session = session();
        $laporan = $session->get('laporan') ?? [];

        foreach ($laporan as &$item) {
            if ($item['id_laporan'] == $id) {
                $item['nm_brg'] = $this->request->getPost('nm_brg');
                $item['stok'] = $this->request->getPost('stok');
                $item['barang_masuk'] = $this->request->getPost('barang_masuk');
                $item['barang_keluar'] = $this->request->getPost('barang_keluar');
                break;
            }
        }

        $session->set('laporan', $laporan);

        session()->setFlashdata('pesan', 'Data berhasil diperbarui.');
        return redirect()->to('/');
    }

    public function delete($id)
    {
        $session = session();
        $laporan = $session->get('laporan') ?? [];

        $laporan = array_filter($laporan, function ($item) use ($id) {
            return $item['id_laporan'] != $id;
        });

        $session->set('laporan', $laporan);

        session()->setFlashdata('pesan', 'Data berhasil dihapus.');
        return redirect()->to('/');
    }

// Produksi
    public function laporan_produksi()
    {
        $session = session();
        $produksi = new ProduksiModel();

        $data = [
            'title' => 'Laporan Produksi',
            'produksi' => $produksi->laporanProduksi()
        ];
        return view('laporan/produksi/laporan', $data);
    }

    public function cetak_produksi()
    {
        $session = session();
        $produksi = new ProduksiModel();

        $data = [
            'title' => 'Laporan Data Produksi',
            'produksi' => $produksi->laporanProduksi()
        ];
        return view('laporan/produksi/cetak', $data);
    }

    public function laporan_pengajuan()
    {
        $session = session();
        $pengajuan = new PengajuanModel();

        $data = [
            'title' => 'Laporan Pengajuan',
            'pengajuan' => $pengajuan->laporanPengajuan()
        ];
        return view('laporan/produksi/laporanPengajuan', $data);
    }

    public function cetak_pengajuan()
    {
        $session = session();
        $pengajuan = new PengajuanModel();

        $data = [
            'title' => 'Laporan Data Pengajuan',
            'pengajuan' => $pengajuan->laporanPengajuan()
        ];
        return view('laporan/produksi/cetakPengajuan', $data);
    }

    public function laporan_masuk()
    {
        $session = session();
        $masuk = new StokMasukModel();

        $data = [
            'title' => 'Laporan Stok Masuk',
            'masuk' => $masuk->laporanMasuk()
        ];
        return view('laporan/produksi/laporanMasuk', $data);
    }

    public function cetak_masuk()
    {
        $session = session();
        $masuk = new StokMasukModel();

        $data = [
            'title' => 'Laporan Data Stok Masuk',
            'masuk' => $masuk->laporanMasuk()
        ];
        return view('laporan/produksi/cetakMasuk', $data);
    }

    public function laporan_stok()
    {
        $session = session();
        $stok = new StokkModel();

        $data = [
            'title' => 'Laporan Stok Real',
            'stok' => $stok->laporanStok()
        ];
        return view('laporan/produksi/laporanStok', $data);
    }

    public function cetak_stok()
    {
        $session = session();
        $stok = new StokkModel();

        $data = [
            'title' => 'Laporan Data Stok Real',
            'stok' => $stok->laporanStok()
        ];
        return view('laporan/produksi/cetakStok', $data);
    }
}
