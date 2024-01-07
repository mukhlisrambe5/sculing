<?php

namespace App\Models;

use CodeIgniter\Model;
use PhpParser\Node\Expr\Isset_;

class ModelBoscu extends Model
{
    protected $table = 'tbl_boscu';
    protected $primaryKey = 'id_boscu';
    protected $allowedFields = ['kuartal', 'tahun', 'kandidat', 'terpilih', 'kep', 'ket'];


    public function all_data_pegawai()
    {
        return $this->db->table('tbl_pegawai')
            ->get()->getResultArray();
    }
    var $column_order = array(null, 'tahun', 'kuartal', 'kandidat', 'terpilih', 'kep', null);

    var $order = array('id_boscu' => 'desc');



    function get_datatables()
    {
        if (isset($_POST['search']['value'])) {

            $search = $_POST['search']['value'];
            $kondisi_search = "kuartal LIKE '%$search%' OR tahun LIKE '%$search%' OR kandidat LIKE '%$search%' OR terpilih LIKE '%$search%'";
        } else {
            $kondisi_search = "id_boscu!= ''";
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
            $builder = $db->table('tbl_boscu');
            $query = $builder->select('*')
                ->join('tbl_pegawai', 'tbl_pegawai.nipp= tbl_boscu.terpilih', 'left')
                ->where($kondisi_search)
                ->orderBy($result_order, $result_dir)
                ->limit($_POST['length'], $_POST['start'])
                ->get();
            return $query->getResult();
        }

        function detail($id_boscu)
        {
            return $this->db->table('tbl_boscu')
                ->where('id_boscu', $id_boscu)
                ->get()->getRowArray();
        }
    }



    function jumlah_semua()
    {
        $sQuery = "SELECT COUNT(id_boscu) as jml FROM tbl_boscu";
        $db = db_connect();
        $query = $db->query($sQuery)->getRow();
        return $query;
    }

    function jumlah_filter()
    {

        if (isset($_POST['search']['value'])) {
            $search = $_POST['search']['value'];
            $kondisi_search = "AND (kuartal LIKE '%$search%' OR tahun LIKE '%$search%' OR kandidat LIKE '%$search%' OR terpilih LIKE '%$search%')";
        } else {
            $kondisi_search = "";
        }

        $sQuery = "SELECT COUNT(id_boscu) as jml FROM tbl_boscu WHERE id_boscu != '' $kondisi_search";
        $db = db_connect();
        $query = $db->query($sQuery)->getRow();
        return $query;
    }

    function get_name($nip)
    {
        return $this->db->table('tbl_pegawai')
            ->where('tbl_pegawai.nipp', $nip)
            ->get()->getRow();
    }

    function simpandata($data)
    {
        $this->db->table('tbl_boscu')->insert($data);
    }


    function detail($id_boscu)
    {
        return $this->db->table('tbl_boscu')
            ->join('tbl_pegawai', 'tbl_pegawai.nipp= tbl_boscu.terpilih', 'left')
            ->where('id_boscu', $id_boscu)
            ->get()->getRowArray();
    }

    function kandidat($id_boscu)
    {
        return $this->db->table('tbl_boscu')
            ->select('kandidat')
            // ->select('*')
            ->join('tbl_pegawai', 'tbl_pegawai.nipp= tbl_boscu.terpilih', 'left')
            ->where('id_boscu', $id_boscu)
            ->get()->getRowArray();
        // ->get()->getResult();

    }


    function edit_data($data, $id_boscu)
    {
        return $this->db->table('tbl_boscu')->update($data, array('id_boscu' => $id_boscu));
    }


    function hapus($id_boscu)
    {
        return $this->db->table('tbl_boscu')->delete(array('id_boscu' => $id_boscu));
    }
}