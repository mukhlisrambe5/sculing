<?php

namespace App\Controllers;

use App\Models\ModelPegawai;
use App\Models\ModelFirst;
use App\Models\ModelUnit;


class First extends BaseController
{
    public function __construct()
    {
        $this->ModelPegawai = new ModelPegawai();
        $this->ModelFirst = new ModelFirst();
        $this->ModelUnit = new ModelUnit();

        helper('form');


    }
    public function index()
    {
        $data = [
            'first' => $this->ModelFirst->all_data(),
            'unit' => $this->ModelUnit->all_data(),

        ];
        return view('first/view', $data);
    }



    public function dataFirst()
    {

        $model = new ModelFirst();
        $listing = $model->get_datatables();
        $jumlah_semua = $model->jumlah_semua();
        $jumlah_filter = $model->jumlah_filter();

        $data = array();
        $no = $_POST['start'];
        foreach ($listing as $key) {
            $no++;
            $row = array();

            $tomboledit = "<a class=\"btn btn-md btn-success\" data-toggle=\"modal\" data-target=\"#edit\/$key->id_pegawai\"><i class=\"fas fa-arrow-right mr-2\"></i>Input Data</a>";

            $row[] = $no;
            $row[] = $key->nama_pegawai;
            $row[] = $key->nipp;
            $row[] = $key->jabatan;

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

    public function rekamFirst($id_pegawai)
    {
        $data = [
            'nama_pegawai' => $this->request->getPost('nama_pegawai'),
           
        ];
        $this->ModelPegawai->input_First($data, $id_pegawai);
        session()->setFlashdata('successEdit', 'Data berhasil diupdate!');
        return redirect()->to(base_url('First'));
    }



}