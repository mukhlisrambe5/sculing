<?php

namespace App\Models;

use CodeIgniter\Model;
use DateTime;
use PhpParser\Node\Expr\Isset_;

class ModelData extends Model
{

    var $column_order = array(null, 'nama_pegawai', 'nip', 'jabatan', 'unit_now', 'tmt', 'durasi', null);
    var $order = array('nama_pegawai' => 'asc');


    // public function all_data()
    // {
    //     return $this->db->table('tbl_penempatan')
    //         ->get()->getResultArray();
    // }



    function get_datatables()
    {
        if (isset($_POST['search']['value'])) {

            $search = $_POST['search']['value'];
            $kondisi_search = "nama_pegawai LIKE '%$search%' OR  nip LIKE '%$search%' OR  jabatan LIKE '%$search%' OR nama_unit LIKE '%$search%' OR tmt LIKE '%$search%'";
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
            $builder = $db->table('tbl_penempatan')
                ->join('tbl_pegawai', 'tbl_pegawai.nipp= tbl_penempatan.nip', 'right')
                ->join('tbl_unit', 'tbl_unit.id_unit= tbl_penempatan.unit_now', 'left')
                ->groupBy('nip')
                ->where($kondisi_search)
                ->orderBy($result_order, $result_dir)
                ->limit($_POST['length'], $_POST['start']);
            $subquery = $db->table('tbl_penempatan')
                ->select('MAX(tmt) AS max_tmt', false) // Assuming you want to get the max_tmt column
                ->groupBy('nip');

            $builder->join("(" . $subquery->getCompiledSelect() . ") AS subquery", 'tbl_penempatan.tmt = subquery.max_tmt', 'left');
            // Output the generated SQL queries
            // echo "Main Query: " . $builder->getCompiledSelect() . PHP_EOL;
            // echo "Subquery: " . $subquery->getCompiledSelect() . PHP_EOL;

            $result = $builder->get()->getResult();


            return $result;
            // print_r($query->getResult());
            // print_r($query->getResult());
            //this work but besides max_date it's pick the initial unit and durasi
            // $builder = $db->table('tbl_penempatan');
            // $query = $builder->select('*')
            //     ->selectMax('tmt', 'max_tmt') // Using selectMax to get the maximum tmt for each nip
            //     ->selectMin('durasi', 'min_durasi')
            //     ->groupBy('nip')
            //     ->join('tbl_pegawai', 'tbl_pegawai.nipp = tbl_penempatan.nip', 'left')
            //     ->join('tbl_unit', 'tbl_unit.id_unit = tbl_penempatan.unit_now', 'left')
            //     ->where($kondisi_search)
            //     ->orderBy($result_order, $result_dir)
            //     ->limit($_POST['length'], $_POST['start'])
            //     ->get();
            // return $query->getResult();

            // print_r($query->getResult());


            // $builder = $db->table('tbl_penempatan');
            // $query = $builder->select('*')
            //     ->selectMax('tmt', 'max_tmt') // Using selectMax to get the maximum tmt for each nidfdgp
            //     ->groupBy('nip')
            //     ->join('tbl_pegawai', 'tbl_pegawai.nipp = tbl_penempatan.nip', 'left')
            //     ->join('tbl_unit', 'tbl_unit.id_unit = tbl_penempatan.unit_now', 'left')
            //     ->where($kondisi_search)
            //     ->orderBy($result_order, $result_dir)
            //     ->limit($_POST['length'], $_POST['start'])
            //     ->get();

            // // Add a HAVING condition to filter by max_tmt
            // if (isset($_POST['max_tmt_filter']) && $_POST['max_tmt_filter'] != '') {
            //     $query->having('max_tmt', $_POST['max_tmt_filter']);
            // }
            // return $query->getResult();

            //this works but one nip result several data
            // $builder = $db->table('tbl_penempatan');
            // $subquery = clone $builder;

            // $query = $builder
            //     ->select('*')
            //     ->where("(`nip`, `tmt`) IN (" . $subquery->select('nip, MAX(tmt) as max_tmt')
            //         ->groupBy('nip')
            //         ->getCompiledSelect() . ")", null, false)
            //     ->groupBy('nip')
            //     ->join('tbl_pegawai', 'tbl_pegawai.nipp = tbl_penempatan.nip', 'left')
            //     ->join('tbl_unit', 'tbl_unit.id_unit = tbl_penempatan.unit_now', 'left')
            //     ->where($kondisi_search)
            //     ->orderBy($result_order, $result_dir)
            //     ->limit($_POST['length'], $_POST['start'])
            //     ->get();

            // return $query->getResult();


            //same result with the previous code
            // $builder = $db->table('tbl_penempatan');
            // $subquery = clone $builder;
            // $query = $builder
            //     ->select('*')
            //     ->join('tbl_pegawai', 'tbl_pegawai.nipp = tbl_penempatan.nip', 'left')
            //     ->join('tbl_unit', 'tbl_unit.id_unit = tbl_penempatan.unit_now', 'left')
            //     ->whereIn("(`nip`, `tmt`)", function ($subquery) {
            //         $subquery->select('nip, MAX(tmt) as max_tmt')
            //             ->from('tbl_penempatan')
            //             ->groupBy('nip');
            //     })
            //     ->where($kondisi_search)
            //     ->orderBy($result_order, $result_dir)
            //     ->limit($_POST['length'], $_POST['start'])
            //     ->get();

            // return $query->getResult();


            //same result with the first code
            // $builder = $db->table('tbl_penempatan');
            // $subquery = clone $builder;

            // $query = $builder
            //     ->select('tbl_penempatan.*, tbl_pegawai.*, tbl_unit.*')
            //     ->join('tbl_pegawai', 'tbl_pegawai.nipp = tbl_penempatan.nip', 'left')
            //     ->join('tbl_unit', 'tbl_unit.id_unit = tbl_penempatan.unit_now', 'left')
            //     ->whereIn("(`nip`, `tmt`)", function ($subquery) {
            //         $subquery->select('nip, MAX(tmt) as max_tmt')
            //             ->from('tbl_penempatan')
            //             ->groupBy('nip');
            //     })
            //     ->where($kondisi_search)
            //     ->groupBy('tbl_penempatan.nip') // Group by nip to get only the latest entry for each nip
            //     ->orderBy($result_order, $result_dir)
            //     ->limit($_POST['length'], $_POST['start'])
            //     ->get();

            // // print_r($query->getResult());
            // return $query->getResult();



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
            $kondisi_search = "AND (nama_pegawai LIKE '%$search%' OR nip LIKE '%$search%' OR  jabatan LIKE '%$search%'  OR unit_now LIKE '%$search%' OR tmt LIKE '%$search%')";
        } else {
            $kondisi_search = "";
        }

        $sQuery = "SELECT COUNT(DISTINCT nip) as jml FROM tbl_penempatan RIGHT JOIN tbl_pegawai ON tbl_pegawai.nipp= tbl_penempatan.nip AND id_penempatan != ''  $kondisi_search";
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

    function hapus($id_penempatan)
    {
        return $this->db->table('tbl_penempatan')->delete(array('id_penempatan' => $id_penempatan));
    }

    public function updateDurasiPenempatan()
    {
        // Get the current date
        $currentDate = new DateTime();

        // Fetch 'tmt' values from the database
        $tmtValues = $this->db->table('tbl_penempatan')
            ->select('tmt')
            ->get()
            ->getResult();

        // Iterate through the results and update 'durasi' column
        foreach ($tmtValues as $row) {
            // Convert 'tmt' to DateTime object
            $tmtDate = new DateTime($row->tmt);

            // Calculate the difference in months
            $interval = $currentDate->diff($tmtDate);
            $monthsDifference = ($interval->y * 12) + $interval->m;

            // Update 'durasi' column
            $this->db->table('tbl_penempatan')
                ->set('durasi', $monthsDifference)
                ->where('tmt', $row->tmt)
                ->update();
        }

        return true;
    }

}