<?php

namespace App\Models;

use CodeIgniter\Model;
use PhpParser\Node\Expr\Isset_;

class ModelPegawai extends Model
{
    public function all_data()
    {
        return $this->db->table('tbl_pegawai')
            ->get()->getResultArray();
    }

    public function all_data_penempatan()
    {
        return $this->db->table('tbl_pegawai')
            ->join('tbl_penempatan', 'tbl_pegawai.nipp= tbl_penempatan.nip', 'left')
            ->join('tbl_unit', 'tbl_unit.id_unit = tbl_penempatan.unit_now', 'left')
            ->get()->getResultArray();
    }

    var $column_order = array(null, 'nama_pegawai', 'nipp', 'jabatan', 'status', null);

    var $order = array('nama_pegawai' => 'asc');



    function get_datatables()
    {
        if (isset($_POST['search']['value'])) {

            $search = $_POST['search']['value'];
            $kondisi_search = "nama_pegawai LIKE '%$search%' OR nipp LIKE '%$search%' OR jabatan LIKE '%$search%' OR status LIKE '%$search%'";
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
                ->where($kondisi_search)
                ->orderBy($result_order, $result_dir)
                ->limit($_POST['length'], $_POST['start'])
                ->get();
            return $query->getResult();
        }


    }



    function jumlah_semua()
    {
        $sQuery = "SELECT COUNT(id_pegawai) as jml FROM tbl_pegawai";
        $db = db_connect();
        $query = $db->query($sQuery)->getRow();
        return $query;
    }

    function jumlah_filter()
    {

        if (isset($_POST['search']['value'])) {
            $search = $_POST['search']['value'];
            $kondisi_search = "AND (nama_pegawai LIKE '%$search%' OR nipp LIKE '%$search%' OR jabatan LIKE '%$search%' OR status LIKE '%$search%')";
        } else {
            $kondisi_search = "";
        }

        $sQuery = "SELECT COUNT(id_pegawai) as jml FROM tbl_pegawai WHERE id_pegawai != '' $kondisi_search";
        $db = db_connect();
        $query = $db->query($sQuery)->getRow();
        return $query;
    }

    function add_data($data)
    {
        $this->db->table('tbl_pegawai')->insert($data);
    }

    function edit_data($data, $id_pegawai)
    {
        return $this->db->table('tbl_pegawai')->update($data, array('id_pegawai' => $id_pegawai));
    }
    function delete_data($id_pegawai)
    {
        return $this->db->table('tbl_pegawai')->delete(array('id_pegawai' => $id_pegawai));
    }

}