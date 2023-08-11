<?php

namespace App\Controllers;

use App\Models\ModelPegawai;
use App\Models\ModelRolling;


class Rolling extends BaseController
{
    public function __construct()
    {
        $this->ModelPegawai = new ModelPegawai();
        $this->ModelRolling = new ModelRolling();

        helper('form');


    }
    public function index()
    {
        $data = [
            'rolling' => $this->ModelRolling->all_data(),
            'pegawai' => $this->ModelPegawai->all_data(),
        ];
        return view('rolling/view', $data);
    }


    public function dataRolling()
    {

        $model = new ModelRolling();
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


    public function rekamRolling($id_pegawai)
    {
        $data = [
            'nama_pegawai' => $this->request->getPost('nama_pegawai')
        ];
        $this->ModelPegawai->input_rolling($data, $id_pegawai);
        session()->setFlashdata('successEdit', 'Data berhasil diupdate!');
        return redirect()->to(base_url('rolling'));
    }



}