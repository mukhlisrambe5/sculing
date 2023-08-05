<?php

namespace App\Models;

use CodeIgniter\Model;
use PhpParser\Node\Expr\Isset_;

class ModelUnit extends Model
{
    public function all_data()
    {
        return $this->db->table('tbl_unit')
            ->get()->getResultArray();
    }

    var $column_order = array(null, 'nama_unit', null);

    var $order = array('nama_unit' => 'desc');



    function get_datatables()
    {
        if (isset($_POST['search']['value'])) {

            $search = $_POST['search']['value'];
            $kondisi_search = "nama_unit LIKE '%$search%'";
        } else {
            $kondisi_search = "id_unit!= ''";
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
            $builder = $db->table('tbl_unit');
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
        $sQuery = "SELECT COUNT(id_user) as jml FROM tbl_user";
        $db = db_connect();
        $query = $db->query($sQuery)->getRow();
        return $query;
    }

    function jumlah_filter()
    {

        if (isset($_POST['search']['value'])) {
            $search = $_POST['search']['value'];
            $kondisi_search = "AND (username LIKE '%$search%' OR password LIKE '%$search%' OR level LIKE '%$search%' OR status LIKE '%$search%' OR info LIKE '%$search%')";
        } else {
            $kondisi_search = "";
        }

        $sQuery = "SELECT COUNT(id_user) as jml FROM tbl_user WHERE id_user != '' $kondisi_search";
        $db = db_connect();
        $query = $db->query($sQuery)->getRow();
        return $query;
    }

    function add_data($data)
    {
        $this->db->table('tbl_unit')->insert($data);
    }

    function edit_data($data, $id_unit)
    {
        return $this->db->table('tbl_unit')->update($data, array('id_unit' => $id_unit));
    }
    function delete_data($id_unit)
    {
        return $this->db->table('tbl_unit')->delete(array('id_unit' => $id_unit));
    }








}