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
            $builder = $db->table('tbl_penempatan');
            $query = $builder->select('*, MAX(tmt) as max_tmt')
                ->groupBy('nip')
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

        // Fetch 'tmt' values and their corresponding IDs from the database
        $tmtRows = $this->db->table('tbl_penempatan')
            ->select('nip, tmt')
            ->get()
            ->getResult();

        // Initialize variables to store the maximum 'tmt' and corresponding ID
        $maxTmt = null;
        $maxNip = null;

        // Iterate through the results to find the maximum 'tmt'
        foreach ($tmtRows as $row) {
            // Convert 'tmt' to DateTime object
            $tmtDate = new DateTime($row->tmt);

            // Calculate the difference in months
            $interval = $currentDate->diff($tmtDate);
            $monthsDifference = ($interval->y * 12) + $interval->m;

            // Check if this 'tmt' is greater than the current maximum
            if ($maxTmt === null || $tmtDate > $maxTmt) {
                $maxTmt = $tmtDate;
                $maxNip = $row->nip;
            }
        }

        // Update 'durasi' column for the row with the maximum 'tmt'
        if ($maxNip !== null) {
            $this->db->table('tbl_penempatan')
                ->set('durasi', $monthsDifference)
                ->where('nip', $maxNip)
                ->update();
        }

        return true;
    }

}