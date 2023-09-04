<?php

namespace App\Models;

use CodeIgniter\Model;
use PhpParser\Node\Expr\Isset_;

class ModelDataDetail extends Model
{

    var $column_order = array(null, 'nama_pegawai', 'nip', 'nama_unit', 'tmt', null);
    var $order = array('nama_pegawai' => 'asc');




    function get_datatables()
    {
        if (isset($_POST['search']['value'])) {

            $search = $_POST['search']['value'];
            $kondisi_search = "nama_pegawai LIKE '%$search%' OR  nip LIKE '%$search%' OR unit_now LIKE '%$search%' OR tmt LIKE '%$search%'";
        } else {
            $kondisi_search = "id_penempatan != ''";
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
            $builder = $db->table('tbl_penempatan');
            $query = $builder->select('*')
                // ->groupBy('nip')
                ->join('tbl_pegawai', 'tbl_pegawai.nipp= tbl_penempatan.nip', 'left')
                ->join('tbl_unit', 'tbl_unit.id_unit= tbl_penempatan.unit_now', 'left')
                ->where($kondisi_search)
                ->orderBy($result_order, $result_dir)
                ->limit($_POST['length'], $_POST['start'])
                ->get();
            return $query->getResult();

        }
    }

    function jumlah_semua()
    {
        $sQuery = "SELECT COUNT(nip) as jml FROM tbl_penempatan";

        $db = db_connect();
        $query = $db->query($sQuery)->getRow();
        return $query;
    }


    function jumlah_filter()
    {

        if (isset($_POST['search']['value'])) {
            $search = $_POST['search']['value'];
            $kondisi_search = "AND (nama_pegawai LIKE '%$search%' OR nip LIKE '%$search%' OR unit_now LIKE '%$search%' OR tmt LIKE '%$search%')";
        } else {
            $kondisi_search = "";
        }

        $sQuery = "SELECT COUNT(nip) as jml FROM tbl_penempatan RIGHT JOIN tbl_pegawai ON tbl_pegawai.nipp= tbl_penempatan.nip AND id_penempatan != ''  $kondisi_search";
        $db = db_connect();
        $query = $db->query($sQuery)->getRow();
        return $query;
    }

    function detail($id_penempatan)
    {
        return $this->db->table('tbl_penempatan')
            ->where('id_penempatan', $id_penempatan)
            ->get()->getRowArray();
    }

}