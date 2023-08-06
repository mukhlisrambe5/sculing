<?php

namespace App\Controllers;

use App\Models\ModelSkill;

class Skill extends BaseController
{
    public function __construct()
    {
        $this->ModelSkill = new ModelSkill();
        helper('form');


    }
    public function index()
    {
        $data = [
            'skill' => $this->ModelSkill->all_data(),
        ];
        return view('setting/skill', $data);
    }


    public function dataskill()
    {

        $model = new ModelSkill();
        $listing = $model->get_datatables();
        $jumlah_semua = $model->jumlah_semua();
        $jumlah_filter = $model->jumlah_filter();

        $data = array();
        $no = $_POST['start'];
        foreach ($listing as $key) {
            $no++;
            $row = array();

            $tomboldelete = "<a href=\"./skill/deleteSkill/$key->id_skill  \" class=\"btn btn-md btn-danger \" id=\"tomboldelete\" onclick=\"return confirm('Yakin ingin menghapus data skill: $key->nama_skill?')\"><i class=\"fas fa-trash\"></i> Delete</a>";
            $tomboledit = "<a class=\"btn btn-md btn-warning\" data-toggle=\"modal\" data-target=\"#edit\/$key->id_skill\"><i class=\"fas fa-edit\"></i> Edit</a>";


            $row[] = $no;
            $row[] = $key->nama_skill;
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

    public function tambahskill()
    {
        $data = [
            'nama_skill' => $this->request->getPost('nama_skill'),

        ];

        $this->ModelSkill->add_data($data);
        session()->setFlashdata('success', 'Data skill berhasil ditambahkan');
        return redirect()->to(base_url('skill'));
    }

    public function deleteskill($id_skill)
    {
        $this->ModelSkill->delete_data($id_skill);
        session()->setFlashdata('successDelete', 'Data berhasil dihapus!');
        return redirect()->to(base_url('skill'));
    }

    public function editskill($id_skill)
    {
        $data = [
            'nama_skill' => $this->request->getPost('nama_skill'),

        ];
        $this->ModelSkill->edit_data($data, $id_skill);
        session()->setFlashdata('successEdit', 'Data berhasil diupdate!');
        return redirect()->to(base_url('skill'));
    }



}