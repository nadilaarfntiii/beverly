<?php

namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{
    protected $table = "user";
    protected $primarykey = "id_user";
    protected $allowedFields = ['id_user', 'nama', 'password', 'alamat', 'jekel', 'no_telp', 'bagian'];

    // Fungsi untuk mendapatkan data pengguna berdasarkan username dan bagian
    public function getUserByCredentials($username, $bagian)
    {
        return $this->where('id_user', $username)
                    ->where('bagian', $bagian)
                    ->first();
    }
}
