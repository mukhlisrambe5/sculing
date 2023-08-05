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

            $tomboldelete = "<a href=\"./deleteUser/$key->id_unit  \" class=\"btn btn-md btn-danger \" id=\"tomboldelete\" onclick=\"return confirm('Yakin ingin menghapus data user: $key->nama_unit?')\"><i class=\"fas fa-trash\"></i> Delete</a>";
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

    // public function tambahuser()
    // {
    //     $data = [
    //         'username' => $this->request->getPost('username'),
    //         'password' => sha1($this->request->getPost('password')),
    //         'level' => $this->request->getPost('level'),
    //         'status' => $this->request->getPost('status'),
    //         'info' => $this->request->getPost('info')
    //     ];

    //     $this->ModelAdmin->add_data($data);
    //     session()->setFlashdata('success', 'Data User berhasil ditambahkan');
    //     return redirect()->to(base_url('admin/settingUsers'));
    // }

    // public function deleteUser($id_user)
    // {
    //     $this->ModelAdmin->delete_data($id_user);
    //     session()->setFlashdata('successDelete', 'Data berhasil dihapus!');
    //     return redirect()->to(base_url('admin/settingUsers'));
    // }

    // public function editUser($id_user)
    // {
    //     $data = [
    //         'username' => $this->request->getPost('username'),
    //         'password' => sha1($this->request->getPost('password')),
    //         'level' => $this->request->getPost('level'),
    //         'status' => $this->request->getPost('status'),
    //         'info' => $this->request->getPost('info')
    //     ];
    //     $this->ModelAdmin->edit_data($data, $id_user);
    //     session()->setFlashdata('successEdit', 'Data berhasil diupdate!');
    //     return redirect()->to(base_url('admin/settingUsers'));
    // }



}