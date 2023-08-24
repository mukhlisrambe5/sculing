<?php

namespace App\Models;

use CodeIgniter\Model;
use PhpParser\Node\Expr\Isset_;

class ModelSkill extends Model
{
    public function all_data()
    {
        return $this->db->table('tbl_skill')
            ->get()->getResultArray();
    }

    var $column_order = array(null, 'nama_skill', null);

    var $order = array('nama_skill' => 'asc');



    function get_datatables()
    {
        if (isset($_POST['search']['value'])) {

            $search = $_POST['search']['value'];
            $kondisi_search = "nama_skill LIKE '%$search%'";
        } else {
            $kondisi_search = "id_skill!= ''";
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
            $builder = $db->table('tbl_skill');
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
        $sQuery = "SELECT COUNT(id_skill) as jml FROM tbl_skill";
        $db = db_connect();
        $query = $db->query($sQuery)->getRow();
        return $query;
    }

    function jumlah_filter()
    {

        if (isset($_POST['search']['value'])) {
            $search = $_POST['search']['value'];
            $kondisi_search = "AND (nama_skill LIKE '%$search%')";
        } else {
            $kondisi_search = "";
        }

        $sQuery = "SELECT COUNT(id_skill) as jml FROM tbl_skill WHERE id_skill != '' $kondisi_search";
        $db = db_connect();
        $query = $db->query($sQuery)->getRow();
        return $query;
    }

    function add_data($data)
    {
        $this->db->table('tbl_skill')->insert($data);
    }

    function edit_data($data, $id_skill)
    {
        return $this->db->table('tbl_skill')->update($data, array('id_skill' => $id_skill));
    }
    function delete_data($id_skill)
    {
        return $this->db->table('tbl_skill')->delete(array('id_skill' => $id_skill));
    }

    function add_data_pegawai($data)
    {
        $this->db->table('tbl_skill_pegawai')->insert($data);
    }
    function edit_data_pegawai($data, $id_skill_pegawai)
    {
        return $this->db->table('tbl_skill_pegawai')->update($data, array('id_skill_pegawai' => $id_skill_pegawai));
    }

    public function detail_data($id_skill_pegawai)
    {
    return $this->db->table('tbl_skill_pegawai')
    ->where('id_skill_pegawai', $id_skill_pegawai)
    ->get()->getRowArray();
    }








}