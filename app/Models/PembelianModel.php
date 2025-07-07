<?php

namespace App\Models;

use CodeIgniter\Model;

class PembelianModel extends Model
{
    protected $table = 'gd_pembelian';
    protected $primaryKey = 'id_pemb';
    protected $allowedFields = ['id_pemb', 'id_brg', 'id_user', 'qty', 'tgl_pemb', 'upload', 'status'];

    public function getPembelian($idpembelian = false)
    {
        if ($idpembelian == false) {
            return $this->findAll();
        }

        return $this->where(['id_pemb' => $idpembelian])->first();
    }

    public function getAll()
    {
        return $this->db->table($this->table)
        ->select('*')
        ->join('gd_stok', 'gd_pembelian.id_brg=gd_stok.id_brg')
        ->join('user', 'gd_pembelian.id_user=user.id_user')
        ->get()->getResult();
    }

    public function disetujui($idpemb)
    {
        $this->db = \Config\Database::connect();  // Ensure $this->db is set
        $sql = "UPDATE gd_pembelian SET status='disetujui' WHERE id_pemb=$idpemb";
        $this->db->query($sql);
        session()->setFlashdata('message', '<div class="alert alert-success" role="alert">  Data Telah Disetujui <button type="button" 
        class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
        return redirect()->to(site_url('permintaan_gudang'));
    }

    public function ditolak($idpemb)
    {
        $this->db = \Config\Database::connect();  // Ensure $this->db is set
        $sql = "UPDATE gd_pembelian SET status='ditolak' WHERE id_pemb=$idpemb";
        $this->db->query($sql);
        session()->setFlashdata('message', '<div class="alert alert-danger" role="alert">  Data Telah Ditolak <button type="button" 
        class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
        return redirect()->to(site_url('permintaan_gudang'));
    }

    public function getTotalHarga($idpemb)
    {
        $detailPembelian = $this->getDetailPembelian($idpemb);
        $totalHarga = 0;
        foreach ($detailPembelian as $detail) {
            $totalHarga += $detail['harga'] * $detail['qty'];
        }
        return $totalHarga;
    }
}
