<?php

namespace App\Models;

use CodeIgniter\Model;
use PhpParser\Node\Expr\Isset_;

class ModelDataSkill extends Model
{

    // var $column_order = array(null, 'nama_pegawai', 'nip', 'nama_unit', 'tmt', null);
    var $column_order = array(null, 'nama_pegawai', 'nip_skill', 'keahlian', null, null, null);

    var $order = array('nama_pegawai' => 'asc');



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
        $sQuery = "SELECT COUNT(DISTINCT nip) as jml FROM tbl_penempatan";

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

        $sQuery = "SELECT COUNT(DISTINCT nip) as jml FROM tbl_penempatan RIGHT JOIN tbl_pegawai ON tbl_pegawai.nipp= tbl_penempatan.nip AND id_penempatan != ''  $kondisi_search";
        $db = db_connect();
        $query = $db->query($sQuery)->getRow();
        return $query;
    }

    // function add_data($data)
    // {
    //     $this->db->table('tbl_penempatan')->insert($data);
    // }

    // // function edit_data($data, $id_penempatan)
    // // {
    // //     return $this->db->table('tbl_user')->update($data, array('id_user' => $id_user));
    // // }
    // function update_data($data)
    // {
    //     return $this->db->table('tbl_penempatan')
    //     ->where('id_penempatan', $data['id_penempatan'])
    //     ->update($data);
    // }

    // function delete_data($id_penempatan)
    // {
    //     return $this->db->table('tbl_penempatan')->delete(array('id_penempatan' => $id_penempatan));
    // }
    // function detail($id){
    //     return $this->db->table('tbl_penempatan')
    //     ->where('id_penempatan', $id)
    //     ->get()->getRowArray();
    // }



}