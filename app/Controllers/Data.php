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

        $this->db = \Config\Database::connect(); // Inject the database service

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
    // Controller method
    public function test()
    {

        $builder = $this->db->table('tbl_penempatan')
            ->join('tbl_pegawai', 'tbl_pegawai.nipp= tbl_penempatan.nip', 'right')
            ->join('tbl_unit', 'tbl_unit.id_unit= tbl_penempatan.unit_now', 'left')
            ->groupBy('nip');

        $subquery = $this->db->table('tbl_penempatan')
            ->select('MAX(tmt) AS max_tmt', false) // Assuming you want to get the max_tmt column
            ->groupBy('nip');

        $builder->join("(" . $subquery->getCompiledSelect() . ") AS subquery", 'tbl_penempatan.tmt = subquery.max_tmt', 'left');

        $result = $builder->get()->getResult();

        // $subquery = $this->db->table('tbl_penempatan')
        //     ->select('nip, MAX(tmt) AS max_tmt', false)
        //     ->groupBy('nip');

        // $result = $subquery->get()->getResult();

        $data['resultData'] = $result;

        // Load the view and pass data to it
        return view('data/test', $data);
    }


    public function dataPenempatan()
    {
        //buat fungsi otomatis untuk mengupdate duraasi pada tabel penempatan
        // $this->updateDurasi();

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
            $row[] = $key->jabatan;
            $row[] = $key->nama_unit;
            $row[] = $key->tmt;
            $row[] = $key->durasi . " bulan";
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
            'skill' => $this->ModelSkill->all_data(),
            'pegawai' => $this->ModelPegawai->all_data(),

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
            $tomboledit = "<a class=\"btn btn-md btn-warning\" data-toggle=\"modal\" data-target=\"#edit\/$key->id_skill_pegawai\"><i class=\"fas fa-pencil-alt mr-2\"></i>Edit </a>";

            $tombolhapus = "<a href=\"./hapusSkill/$key->id_skill_pegawai  \" class=\"btn btn-md btn-danger \" id=\"tombolhapus\" onclick=\"return confirm('Yakin ingin menghapus data ini')\"><i class=\"fas fa-trash\"></i> Delete</a>";


            $row[] = $no;
            $row[] = "<div class=\"text-center\">" . $tomboladd . "</div>";
            $row[] = $key->nama_pegawai;
            $row[] = $key->nipp;
            $row[] = $key->nama_skill;
            // $row[] = $key->file_keahlian;
            $row[] = "<a href=\"./downloadFileSkill/$key->id_skill_pegawai\" target=\"_blank\">$key->file_keahlian</a>";

            $row[] = $key->detail;
            $row[] = "<div class=\"text-center\">" . $tomboledit . " " . $tombolhapus . "</div>";

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

    public function addSkill()
    {

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

            $tombolhapus = "<a href=\"./hapus/$key->id_penempatan  \" class=\"btn btn-md btn-danger \" id=\"tombolhapus\" onclick=\"return confirm('Yakin ingin menghapus data ini')\"><i class=\"fas fa-trash\"></i> Delete</a>";


            $row[] = $no;
            $row[] = $key->nama_pegawai;
            $row[] = $key->nipp;
            $row[] = $key->jabatan;
            $row[] = $key->nama_unit;
            $row[] = Time::parse($key->tmt)->toLocalizedString('dd-MMM-yyyy');
            $row[] = "<a href=\"./downloadFileKep/$key->id_penempatan\" target=\"blank\" >$key->kep</a>";

            $row[] = "<div class=\"text-center\">" . $tomboledit . " " . $tombolhapus . "</div> ";
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

    function updateDurasi()
    {
        $this->ModelData->updateDurasiPenempatan();
        // $data = ['result' => 'Function executed successfully!'];
        // return $this->response->setJSON($data);

        // $date = new DateTime();
        // $datePenempatan = new DateTime($datePenempatan);
        // $duration = ($date->diff($datePenempatan)->y * 12) + $date->diff($datePenempatan)->m;
        // return ($duration);

    }

    function downloadFileKep($id)
    {
        $model = new ModelDataDetail();
        $berkas = $model->detail($id);
        $data = $berkas['kep'];
        return $this->response->download('uploaded/fileKep/' . $data, null);
    }

    function downloadFileSkill($id)
    {
        $model = new ModelDataSkill();
        $berkas = $model->detail($id);
        $data = $berkas['file_keahlian'];
        return $this->response->download('uploaded/fileSkill/' . $data, null);
    }

    public function hapus($id_penempatan)
    {

        $berkas = $this->ModelData->detail($id_penempatan);
        if ($berkas['kep'] !== "") {
            unlink('uploaded/fileKep/' . $berkas['kep']);
        }

        $this->ModelData->hapus($id_penempatan);
        session()->setFlashdata('successDelete', 'Data berhasil dihapus!');
        return redirect()->to(base_url('data/detailPenempatan'));
    }

    public function hapusSkill($id_skill_pegawai)
    {

        $berkas = $this->ModelDataSkill->detail($id_skill_pegawai);
        if ($berkas['file_keahlian'] !== "") {
            unlink('uploaded/fileSkill/' . $berkas['file_keahlian']);
        }

        $this->ModelDataSkill->hapus($id_skill_pegawai);
        session()->setFlashdata('successDelete', 'Data berhasil dihapus!');
        return redirect()->to(base_url('data/skill'));
    }
}