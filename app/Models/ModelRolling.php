<?php

namespace App\Models;

use CodeIgniter\Model;
use PhpParser\Node\Expr\Isset_;

class ModelRolling extends Model
{
    public function all_data()
    {
        return $this->db->table('tbl_penempatan')
            ->get()->getResultArray();
    }

    var $column_order = array(null, 'nama_pegawai', 'nipp', null);

    var $order = array('nama_pegawai' => 'asc');



    function get_datatables()
    {
        if (isset($_POST['search']['value'])) {

            $search = $_POST['search']['value'];
            $kondisi_search = "nama_pegawai LIKE '%$search%' OR nipp LIKE '%$search%'";
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
            $query = $builder->select('tbl_pegawai.*')
                ->join('tbl_penempatan', 'tbl_pegawai.nipp= tbl_penempatan.nip', 'inner')
                ->like('tbl_pegawai.nipp', $search)
                ->orLike('tbl_pegawai.nama_pegawai', $search)
                ->groupBy('tbl_pegawai.nipp')
                ->orderBy($result_order, $result_dir)
                ->limit($_POST['length'], $_POST['start'])
                ->get();
            return $query->getResult();
        }
    }

    function jumlah_semua()
    {
        $sQuery = "SELECT COUNT(DISTINCT nip) as jml FROM tbl_penempatan";

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

        $sQuery = "SELECT COUNT(DISTINCT nip) as jml FROM tbl_penempatan RIGHT JOIN tbl_pegawai ON tbl_pegawai.nipp= tbl_penempatan.nip AND id_penempatan != ''  $kondisi_search";

        $db = db_connect();
        $query = $db->query($sQuery)->getRow();
        return $query;
    }

    function add_data($data)
    {
        $this->db->table('tbl_penempatan')->insert($data);
    }

    function edit_data($data, $id_penempatan)
    {
        return $this->db->table('tbl_penempatan')->update($data, array('id_penempatan' => $id_penempatan));
    }

    public function detail_data($id_penempatan)
    {
        return $this->db->table('tbl_penempatan')
            ->where('id_penempatan', $id_penempatan)
            ->get()->getRowArray();
    }







}