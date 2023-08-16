<?php

namespace App\Controllers;

use App\Models\ModelData;
use App\Models\ModelDataSkill;
// use App\Models\ModelDataSkill;

use CodeIgniter\I18n\Time;

class Data extends BaseController
{
    public function __construct()
    {
        $this->ModelData = new ModelData();
        $this->ModelDataSkill = new ModelDataSkill();

        helper('form');
        helper('time');



    }
    public function index()
    {
        $data = [
            'users' => $this->ModelData->all_data(),
        ];
        return view('data/view', $data);
    }

    public function penempatan()
    {
        return view('data/penempatan/view');
    }

    public function dataPenempatan()
    {

        $model = new ModelData();
        $listing = $model->get_datatables();
        $jumlah_semua = $model->jumlah_semua();
        $jumlah_filter = $model->jumlah_filter();

        $data = array();
        $no = $_POST['start'];
        foreach ($listing as $key) {
            $no++;
            $row = array();

            $tomboledit = "<a class=\"btn btn-md btn-success\" data-toggle=\"modal\" data-target=\"#edit\/$key->id_penempatan\"><i class=\"fas fa-arrow-right\"></i> Rolling</a>";

            $row[] = $no;
            $row[] = $key->nama_pegawai;
            $row[] = $key->nipp;
            $row[] = $key->nama_unit;
            $row[] = Time::parse($key->max_tmt)->toLocalizedString('dd-MMM-yyyy');
            $row[] = Time::parse($key->max_tmt)->difference(Time::parse(date('Y-m-d')))->getYears() . " Tahun " . Time::parse($key->max_tmt)->difference(Time::parse(date('Y-m-d')))->getMonths() . " BUlan ";

            $row[] = "<div class=\"text-center\">" . $tomboledit . "</div>";
            $data[] = $row;
        }
        $output = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $jumlah_semua->jml,
            "recordsFiltered" => $jumlah_filter->jml,
            "data" => $data,
        );
        echo json_encode($output);

    }
    public function skill()
    {
        return view('data/skill/view');
    }

    public function dataSkill()
    {
        $model = new ModelDataSkill();
        $listing = $model->get_datatables();
        $jumlah_semua = $model->jumlah_semua();
        $jumlah_filter = $model->jumlah_filter();

        $data = array();
        $no = $_POST['start'];
        foreach ($listing as $key) {
            $no++;
            $row = array();

            $tomboladd = "<a class=\"btn btn-md btn-primary\" data-toggle=\"modal\" data-target=\"#add\/$key->nipp\"><i class=\"fas fa-plus mr-2\"></i>Tambah Skill</a>";
            $tomboledit = "<a class=\"btn btn-md btn-warning\" data-toggle=\"modal\" data-target=\"#edit\/$key->nipp\"><i class=\"fas fa-pencil-alt mr-2\"></i>Edit </a>";

            $row[] = $no;
            $row[] = "<div class=\"text-center\">" . $tomboladd . "</div>";
            $row[] = $key->nama_pegawai;
            $row[] = $key->nipp;
            // $row[] = "<div class=\"text-center\">" . $tomboledit . "</div>";
            $row[] = $key->nama_skill;
            $row[] = $key->file_keahlian;
            $row[] = $key->detail;
            $row[] = "<div class=\"text-center\">" . $tomboledit . "</div>";

            $data[] = $row;
        }
        $output = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $jumlah_semua->jml,
            "recordsFiltered" => $jumlah_filter->jml,
            "data" => $data,
        );
        echo json_encode($output);
    }
}