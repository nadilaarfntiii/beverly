<?php

namespace App\Models;

use CodeIgniter\Model;

class PengeluaranModel extends Model
{
    protected $table = 'tb_pengeluaran'; // Nama tabel dalam database
    protected $primaryKey = 'id_transaksi'; // Primary key tabel
    protected $allowedFields = ['id_transaksi','tanggal','keterangan','nominal','id_kategori','berkas','id_user'];

    public function getPengeluaranWithDetails()
    {
        return $this->select('tb_pengeluaran.*, tb_kategori.nm_kategori as keterangan_kategori, user.nama as nama_user')
                    ->join('tb_kategori', 'tb_kategori.id_kategori = tb_pengeluaran.id_kategori')
                    ->join('user', 'user.id_user = tb_pengeluaran.id_user')
                    ->findAll();
    }

    public function getTotalPengeluaranBulanIni()
    {
        $db = \Config\Database::connect();
        $builder = $db->table($this->table);
        $builder->selectSum('nominal');
        $builder->where('MONTH(tanggal)', date('m'));
        $builder->where('YEAR(tanggal)', date('Y'));
        $query = $builder->get();
        return $query->getRow()->nominal;
    }

    public function getLaporanPengeluaranBulanIni()
    {
        return $this->db->table('tb_pengeluaran')
                        ->select('id_transaksi, tanggal, keterangan, nominal')
                        ->where('MONTH(tanggal)', date('m'))
                        ->get()
                        ->getResultArray();
    }

    public function deletePengeluaran($idtransaksi)
    {
        return $this->where('id_transaksi', $idtransaksi)->delete();
    }

    public function laporanperBulan($keywoard)
    {
        return $this->table('tb_pengeluaran')
            ->select('id_transaksi, keterangan, nominal, tanggal, MONTH(tanggal) AS bulan')
            ->where('MONTH(tanggal)', $keywoard)
            ->orderBy('tanggal', 'ASC')
            ->get()->getResultArray();
    }
}
