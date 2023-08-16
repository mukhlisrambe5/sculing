<?php

namespace App\Models;

use CodeIgniter\Model;
use PhpParser\Node\Expr\Isset_;

class ModelFirst extends Model
{
    public function all_data()
    {
        return $this->db->table('tbl_pegawai')
            ->join('tbl_penempatan', 'tbl_pegawai.nipp= tbl_penempatan.nip', 'left')
            ->where('tbl_penempatan.nip', null)
            ->get()->getResultArray();
    }



    var $column_order = array(null, 'nama_pegawai', 'nipp', null);
    var $order = array('nama_pegawai' => 'asc');



    function get_datatables()
    {
        if (isset($_POST['search']['value'])) {

            $search = $_POST['search']['value'];

            $kondisi_search = "nama_pegawai LIKE '%$search%' OR nipp LIKE '%$search%' ";

        } else {
            $kondisi_search = "id_pegawai!= ''";
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
            $builder = $db->table('tbl_pegawai');
            $query = $builder->select('*')
                ->join('tbl_penempatan', 'tbl_pegawai.nipp= tbl_penempatan.nip', 'left')
                ->like('tbl_pegawai.nipp', $search)
                ->where('tbl_penempatan.nip', null)
                ->orWhere('tbl_penempatan.nip', null)
                ->like('tbl_pegawai.nama_pegawai', $search)
                ->orderBy($result_order, $result_dir)
                ->limit($_POST['length'], $_POST['start'])
                ->get();
            return $query->getResult();
        }
    }

    function jumlah_semua()
    {
        $sQuery = "SELECT COUNT(id_pegawai) as jml FROM tbl_pegawai  LEFT JOIN tbl_penempatan ON tbl_pegawai.nipp= tbl_penempatan.nip WHERE tbl_penempatan.nip IS NULL";

        $db = db_connect();
        $query = $db->query($sQuery)->getRow();
        return $query;
    }

    function jumlah_filter()
    {

        if (isset($_POST['search']['value'])) {
            $search = $_POST['search']['value'];
            $kondisi_search = "AND (nama_pegawai LIKE '%$search%' OR nipp LIKE '%$search%')";
        } else {
            $kondisi_search = "";
        }

        $sQuery = "SELECT COUNT(id_pegawai) as jml FROM tbl_pegawai  LEFT JOIN tbl_penempatan ON tbl_pegawai.nipp= tbl_penempatan.nip WHERE tbl_penempatan.nip IS NULL AND id_pegawai != '' $kondisi_search";


        $db = db_connect();
        $query = $db->query($sQuery)->getRow();
        return $query;
    }

    // function add_data($data)
    // {
    //     $this->db->table('tbl_pegawai')->insert($data);
    // }

    // function edit_data($data, $id_pegawai)
    // {
    //     return $this->db->table('tbl_pegawai')->update($data, array('id_pegawai' => $id_pegawai));
    // }
    // function delete_data($id_pegawai)
    // {
    //     return $this->db->table('tbl_pegawai')->delete(array('id_pegawai' => $id_pegawai));
    // }


}