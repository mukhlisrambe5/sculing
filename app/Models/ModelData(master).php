<?php

namespace App\Models;

use CodeIgniter\Model;
use PhpParser\Node\Expr\Isset_;

class ModelData extends Model
{
    public function all_data()
    {
        return $this->db->table('tbl_data')
            ->get()->getResultArray();
    }

    var $column_order = array(null, 'elemenVar', 'elemenNum', 'elementSelect', 'elementRadio', 'elementCheck', 'elementTextArea', 'elementDate', 'elementImg', 'elementFile');

    var $order = array('id_data' => 'desc');



    function get_datatables()
    {
        if (isset($_POST['search']['value'])) {

            $search = $_POST['search']['value'];
            $kondisi_search = "elemenVar LIKE '%$search%' OR elemenNum LIKE '%$search%' OR elementSelect LIKE '%$search%' OR elementRadio LIKE '%$search%' OR elementCheck LIKE '%$search%' OR elementTextArea LIKE '%$search%' OR elementDate LIKE '%$search%'  OR elementImg LIKE '%$search%'  OR elementFile LIKE '%$search%'";
        } else {
            $kondisi_search = "id_data != ''";
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
            $builder = $db->table('tbl_data');
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
        $sQuery = "SELECT COUNT(id_data) as jml FROM tbl_data";
        $db = db_connect();
        $query = $db->query($sQuery)->getRow();
        return $query;
    }

    function jumlah_filter()
    {

        if (isset($_POST['search']['value'])) {
            $search = $_POST['search']['value'];
            $kondisi_search = "AND (elemenVar LIKE '%$search%' OR elemenNum LIKE '%$search%' OR elementSelect LIKE '%$search%' OR elementRadio LIKE '%$search%' OR elementCheck LIKE '%$search%' OR elementTextArea LIKE '%$search%' OR elementDate LIKE '%$search%'  OR elementImg LIKE '%$search%'  OR elementFile LIKE '%$search%')";
        } else {
            $kondisi_search = "";
        }

        $sQuery = "SELECT COUNT(id_data) as jml FROM tbl_data WHERE id_data != '' $kondisi_search";
        $db = db_connect();
        $query = $db->query($sQuery)->getRow();
        return $query;
    }

    function add_data($data)
    {
        $this->db->table('tbl_data')->insert($data);
    }

    // function edit_data($data, $id_data)
    // {
    //     return $this->db->table('tbl_user')->update($data, array('id_user' => $id_user));
    // }
    function update_data($data)
    {
        return $this->db->table('tbl_data')
            ->where('id_data', $data['id_data'])
            ->update($data);
    }

    function delete_data($id_data)
    {
        return $this->db->table('tbl_data')->delete(array('id_data' => $id_data));
    }
    function detail($id)
    {
        return $this->db->table('tbl_data')
            ->where('id_data', $id)
            ->get()->getRowArray();
    }









}