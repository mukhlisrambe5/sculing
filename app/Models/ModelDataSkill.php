<?php

namespace App\Models;

use CodeIgniter\Model;
use PhpParser\Node\Expr\Isset_;

class ModelDataSkill extends Model
{

    // var $column_order = array(null, 'nama_pegawai', 'nip', 'nama_unit', 'tmt', null);
    var $column_order = array(null, 'nama_pegawai', 'nip_skill', 'keahlian', null, null, null);

    var $order = array('nama_pegawai' => 'asc');

    function all_data()
    {
        return $this->db->table('tbl_skill_pegawai')
            ->join('tbl_pegawai', 'tbl_pegawai.nipp= tbl_skill_pegawai.nip_skill', 'left')
            ->join('tbl_skill', 'tbl_skill.id_skill= tbl_skill_pegawai.keahlian', 'left')

            // ->where('tbl_penempatan.nip', null)
            ->get()->getResultArray();
    }

    function get_datatables()
    {
        if (isset($_POST['search']['value'])) {

            $search = $_POST['search']['value'];
            $kondisi_search = "nama_pegawai LIKE '%$search%' OR  nip_skill LIKE '%$search%' OR keahlian LIKE '%$search%'";
        } else {
            $kondisi_search = "id_skill_pegawai != ''";
        }



        // order
        if (isset($_POST['order'])) {
            $result_order = $this->column_order[$_POST['order']['0']['column']];
            $result_dir = $_POST['order']['0']['dir'];
        } else if ($this->order) {
            $order = $this->order;
            $result_order = key($order);
            $result_dir = $order[key($order)];
        }


        if (isset($_POST['length'])) {
            if ($_POST['length'] != -1)
                ;
            $db = db_connect();
            $builder = $db->table('tbl_skill_pegawai');
            $query = $builder->select('*')
                ->join('tbl_pegawai', 'tbl_pegawai.nipp= tbl_skill_pegawai.nip_skill', 'left')
                ->join('tbl_skill', 'tbl_skill.id_skill= tbl_skill_pegawai.keahlian', 'left')
                ->where($kondisi_search)
                ->orderBy($result_order, $result_dir)
                ->limit($_POST['length'], $_POST['start'])
                ->get();
            return $query->getResult();

        }
    }



    function jumlah_semua()
    {
        $sQuery = "SELECT COUNT(id_skill_pegawai) as jml FROM tbl_skill_pegawai";

        $db = db_connect();
        $query = $db->query($sQuery)->getRow();
        return $query;
    }

    function jumlah_filter()
    {

        if (isset($_POST['search']['value'])) {
            $search = $_POST['search']['value'];
            $kondisi_search = "AND (nama_pegawai LIKE '%$search%' OR  nip_skill LIKE '%$search%' OR keahlian LIKE '%$search%')";
        } else {
            $kondisi_search = "";
        }

        $sQuery = "SELECT COUNT(id_skill_pegawai) as jml FROM tbl_skill_pegawai RIGHT JOIN tbl_pegawai ON tbl_pegawai.nipp= tbl_skill_pegawai.nip_skill AND id_skill_pegawai != ''  $kondisi_search";
        $db = db_connect();
        $query = $db->query($sQuery)->getRow();
        return $query;

    }

    function detail($id_skill_pegawai)
    {
        return $this->db->table('tbl_skill_pegawai')
            ->where('id_skill_pegawai', $id_skill_pegawai)
            ->get()->getRowArray();
    }

    function hapus($id_skill_pegawai)
    {
        return $this->db->table('tbl_skill_pegawai')->delete(array('id_skill_pegawai' => $id_skill_pegawai));
    }
}