<?php

namespace App\Models;

use CodeIgniter\Model;

class PendapatanModel extends Model
{
    protected $table = 'tb_pendapatan';
    protected $primaryKey = 'id_transaksi';
    protected $allowedFields = ['id_transaksi','tanggal', 'keterangan', 'nominal', 'id_kategori', 'berkas', 'id_user'];

    public function getPendapatanWithDetails()
    {
        return $this->select('tb_pendapatan.*, tb_kategori.nm_kategori as keterangan_pendapatan, user.nama as nama_user')
                    ->join('tb_kategori', 'tb_kategori.id_kategori = tb_pendapatan.id_kategori')
                    ->join('user', 'user.id_user = tb_pendapatan.id_user')
                    ->findAll();
    }
    
    public function getTotalPendapatanBulanIni()
    {
        $db = \Config\Database::connect();
        $builder = $db->table($this->table);
        $builder->selectSum('nominal');
        $builder->where('MONTH(tanggal)', date('m'));
        $builder->where('YEAR(tanggal)', date('Y'));
        $query = $builder->get();
        return $query->getRow()->nominal;
    }


    public function deletePendapatan($idtransaksi)
    {
        return $this->where('id_transaksi', $idtransaksi)->delete();
    }

    public function getPendapatanPerBulan()
    {
        $query = $this->db->query("SELECT MONTH(tanggal) as bulan, SUM(nominal) as total_pendapatan 
                                   FROM tb_pendapatan 
                                   GROUP BY MONTH(tanggal)");

        return $query->getResult();
    }

    public function laporanperBulan($keywoard)
    {
        return $this->table('tb_pendapatan')
            ->select('id_transaksi, keterangan, nominal, tanggal, MONTH(tanggal) AS bulan')
            ->where('MONTH(tanggal)', $keywoard)
            ->orderBy('tanggal', 'ASC')
            ->get()->getResultArray();
    }
}
