<?php

namespace App\Models;

use CodeIgniter\Model;

class LaporanModel extends Model
{
    protected $table1 = 'tb_pendapatan';
    protected $table2 = 'tb_pengeluaran';

    public function getLaporanPendapatan()
    {
        return $this->db->table($this->table1)
            ->select('*')
            ->get()
            ->getResultArray();
    }

    public function getCetakLaporanPendapatan($month = null)
    {
        if ($month) {
            return $this->where('MONTH(tanggal)', $month)->findAll();
        } else {
            return $this->findAll();
        }
    }

    public function getLaporanPendapatanByMonth($month)
    {
        return $this->db->table($this->table1)
            ->select('*')
            ->where('MONTH(tanggal)', $month)
            ->get()
            ->getResultArray();
    }

    public function getLaporanPengeluaran()
    {
        return $this->db->table($this->table2)
            ->select('*')
            ->get()
            ->getResultArray();
    }

    public function getLaporanPengeluaranByMonth($month)
    {
        return $this->db->table($this->table2)
            ->select('*')
            ->where('MONTH(tanggal)', $month)
            ->get()
            ->getResultArray();
    }
}
