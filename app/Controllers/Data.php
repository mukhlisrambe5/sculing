<?php

namespace App\Controllers;

use App\Models\ModelData;
use App\Models\ModelDataSkill;
use App\Models\ModelDataDetail;
use App\Models\ModelPegawai;
use App\Models\ModelUnit;
use App\Models\ModelSkill;

use CodeIgniter\I18n\Time;

class Data extends BaseController
{
    public function __construct()
    {
        $this->ModelData = new ModelData();
        $this->ModelDataSkill = new ModelDataSkill();
        $this->ModelPegawai = new ModelPegawai();
        $this->ModelUnit = new ModelUnit();
        $this->ModelDataDetail = new ModelDataDetail();
        $this->ModelSkill = new ModelSkill();

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
        $data = [
            'pegawai' => $this->ModelPegawai->all_data_penempatan(),
            'unit' => $this->ModelUnit->all_data(),        

        ];
        return view('data/penempatan/view', $data);
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

            $tomboledit = "<a class=\"btn btn-md btn-success\" data-toggle=\"modal\" data-target=\"#edit\/$key->id_pegawai\"><i class=\"fas fa-arrow-right\"></i> Rolling</a>";

            $row[] = $no;
            $row[] = $key->nama_pegawai;
            $row[] = $key->nipp;
            $row[] = $key->jabatan;
            $row[] = $key->nama_unit;

            $row[] = Time::parse($key->max_tmt)->toLocalizedString('dd-MMM-yyyy');
            $row[] = Time::parse($key->max_tmt)->difference(Time::parse(date('Y-m-d')))->getYears() . " Tahun " . (Time::parse($key->max_tmt)->difference(Time::parse(date('Y-m-d')))->getMonths() % 12). " Bulan ";

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
        $data = [
            'skill_pegawai' => $this->ModelDataSkill->all_data(),
            'skill'=>$this->ModelSkill->all_data()
        ];
        return view('data/skill/view', $data);
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

            $tomboladd = "<a class=\"btn btn-md btn-primary\" data-toggle=\"modal\" data-target=\"#add\/$key->nipp\"><i class=\"fas fa-plus mr-2\"></i> Skill</a>";
            $tomboledit = "<a class=\"btn btn-md btn-warning\" data-toggle=\"modal\" data-target=\"#edit\/$key->nipp\"><i class=\"fas fa-pencil-alt mr-2\"></i>Edit </a>";

            $row[] = $no;
            $row[] = "<div class=\"text-center\">" . $tomboladd . "</div>";
            $row[] = $key->nama_pegawai;
            $row[] = $key->nipp;
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

    public function addSkill(){

    }

    public function detailPenempatan()
    {
        $data = [
            'pegawai' => $this->ModelPegawai->all_data_penempatan(),
            'unit' => $this->ModelUnit->all_data(),        

        ];
        return view('data/penempatan/viewDetail', $data);
    }

    public function dataDetailPenempatan()
    {

        $model = new ModelDataDetail();
        $listing = $model->get_datatables();
        $jumlah_semua = $model->jumlah_semua();
        $jumlah_filter = $model->jumlah_filter();

        $data = array();
        $no = $_POST['start'];
        foreach ($listing as $key) {
            $no++;
            $row = array();

            $tomboledit = "<a class=\"btn btn-md btn-warning\" data-toggle=\"modal\" data-target=\"#edit\/$key->id_penempatan\"><i class=\"fas fa-pencil-alt mr-2\"></i> Edit</a>";


            $row[] = $no;
            $row[] = $key->nama_pegawai;
            $row[] = $key->nipp;
            $row[] = $key->jabatan;
            $row[] = $key->nama_unit;
            $row[] = Time::parse($key->tmt)->toLocalizedString('dd-MMM-yyyy');
            $row[] = $key->kep;

            $row[] = "<div class=\"text-center\">" . $tomboledit . "</div> ";
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