<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelAuth extends Model
{
    public function cekLogin($username, $password)
    {
        return $this->db->table('tbl_user')
            ->where([
                'username' => $username,
                'password' => $password,
            ])->get()->getRowArray();
    }
}