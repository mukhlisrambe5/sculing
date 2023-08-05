<?php

namespace App\Controllers;

use App\Models\ModelAdmin;

class Admin extends BaseController
{
    public function __construct()
    {
        $this->ModelAdmin = new ModelAdmin();
        helper('form');


    }
    public function index()
    {
        return view('home');
    }

    public function settingUsers()
    {
        $data = [
            'users' => $this->ModelAdmin->all_data(),
        ];
        return view('setting/users', $data);
    }

    public function dataUsers()
    {

        $model = new ModelAdmin();
        $listing = $model->get_datatables();
        $jumlah_semua = $model->jumlah_semua();
        $jumlah_filter = $model->jumlah_filter();

        $data = array();
        $no = $_POST['start'];
        foreach ($listing as $key) {
            $no++;
            $row = array();


            $tomboldelete = "<a href=\"./deleteUser/$key->id_user  \" class=\"btn btn-md btn-danger \" id=\"tomboldelete\" onclick=\"return confirm('Yakin ingin menghapus data user: $key->username?')\"><i class=\"fas fa-trash\"></i> Delete</a>";

            $tomboledit = "<a class=\"btn btn-md btn-warning\" data-toggle=\"modal\" data-target=\"#edit\/$key->id_user\"><i class=\"fas fa-edit\"></i> Edit</a>";





            $row[] = $no;
            $row[] = $key->username;
            $row[] = $key->level == 1 ? "Admin" : "Petugas";
            $row[] = $key->status == 1 ? "Aktif" : "Tidak Aktif";
            $row[] = $key->info == "" ? "-" : $key->info;
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

    public function tambahuser()
    {
        $data = [
            'username' => $this->request->getPost('username'),
            'password' => sha1($this->request->getPost('password')),
            'level' => $this->request->getPost('level'),
            'status' => $this->request->getPost('status'),
            'info' => $this->request->getPost('info')
        ];

        $this->ModelAdmin->add_data($data);
        session()->setFlashdata('success', 'Data User berhasil ditambahkan');
        return redirect()->to(base_url('admin/settingUsers'));
    }

    public function deleteUser($id_user)
    {
        $this->ModelAdmin->delete_data($id_user);
        session()->setFlashdata('successDelete', 'Data berhasil dihapus!');
        return redirect()->to(base_url('admin/settingUsers'));
    }

    public function editUser($id_user)
    {
        $data = [
            'username' => $this->request->getPost('username'),
            'password' => sha1($this->request->getPost('password')),
            'level' => $this->request->getPost('level'),
            'status' => $this->request->getPost('status'),
            'info' => $this->request->getPost('info')
        ];
        $this->ModelAdmin->edit_data($data, $id_user);
        session()->setFlashdata('successEdit', 'Data berhasil diupdate!');
        return redirect()->to(base_url('admin/settingUsers'));
    }

    public function settingUnit()
    {
        $data = [
            'unit' => $this->ModelAdmin->all_data_unit(),
        ];
        return view('setting/unit', $data);
    }

}