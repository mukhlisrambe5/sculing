<?php

namespace App\Controllers;

use App\Models\ModelUnit;

class Unit extends BaseController
{
    public function __construct()
    {
        $this->ModelUnit = new ModelUnit();
        helper('form');


    }
    public function index()
    {
        $data = [
            'unit' => $this->ModelUnit->all_data(),
        ];
        return view('setting/unit', $data);
    }


    public function dataUnit()
    {

        $model = new ModelUnit();
        $listing = $model->get_datatables();
        $jumlah_semua = $model->jumlah_semua();
        $jumlah_filter = $model->jumlah_filter();

        $data = array();
        $no = $_POST['start'];
        foreach ($listing as $key) {
            $no++;
            $row = array();

            $tomboldelete = "<a href=\"./unit/deleteUnit/$key->id_unit  \" class=\"btn btn-md btn-danger \" id=\"tomboldelete\" onclick=\"return confirm('Yakin ingin menghapus data user: $key->nama_unit?')\"><i class=\"fas fa-trash\"></i> Delete</a>";
            $tomboledit = "<a class=\"btn btn-md btn-warning\" data-toggle=\"modal\" data-target=\"#edit\/$key->id_unit\"><i class=\"fas fa-edit\"></i> Edit</a>";


            $row[] = $no;
            $row[] = $key->nama_unit;
            $row[] = "<div class=\"text-center\">" . $tomboledit . " " . $tomboldelete . "</div>";
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

    public function tambahUnit()
    {
        $data = [
            'nama_unit' => $this->request->getPost('nama_unit'),

        ];

        $this->ModelUnit->add_data($data);
        session()->setFlashdata('success', 'Data Unit berhasil ditambahkan');
        return redirect()->to(base_url('unit'));
    }

    public function deleteUnit($id_unit)
    {
        $this->ModelUnit->delete_data($id_unit);
        session()->setFlashdata('successDelete', 'Data berhasil dihapus!');
        return redirect()->to(base_url('unit'));
    }

    public function editUnit($id_unit)
    {
        $data = [
            'nama_unit' => $this->request->getPost('nama_unit'),

        ];
        $this->ModelUnit->edit_data($data, $id_unit);
        session()->setFlashdata('successEdit', 'Data berhasil diupdate!');
        return redirect()->to(base_url('unit'));
    }



}