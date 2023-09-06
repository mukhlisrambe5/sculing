<?php

namespace App\Controllers;

use App\Models\ModelPegawai;
use App\Models\ModelUnit;
use App\Models\ModelSkill;


class Pegawai extends BaseController
{
    public function __construct()
    {
        $this->ModelPegawai = new ModelPegawai();
        $this->ModelUnit = new ModelUnit();
        $this->ModelSkill = new ModelSkill();

        helper('form');


    }
    public function index()
    {
        $data = [
            'pegawai' => $this->ModelPegawai->all_data(),
            'unit' => $this->ModelUnit->all_data(),
        ];
        return view('setting/pegawai', $data);
    }


    public function dataPegawai()
    {

        $model = new ModelPegawai();
        $listing = $model->get_datatables();
        $jumlah_semua = $model->jumlah_semua();
        $jumlah_filter = $model->jumlah_filter();

        $data = array();
        $no = $_POST['start'];
        foreach ($listing as $key) {
            $no++;
            $row = array();

            $tomboldelete = "<a href=\"./pegawai/deletePegawai/$key->id_pegawai  \" class=\"btn btn-md btn-danger \" id=\"tomboldelete\" onclick=\"return confirm('Yakin ingin menghapus data pegawai: $key->nama_pegawai?')\"><i class=\"fas fa-trash\"></i> Delete</a>";
            $tomboledit = "<a class=\"btn btn-md btn-warning\" data-toggle=\"modal\" data-target=\"#edit\/$key->id_pegawai\"><i class=\"fas fa-edit\"></i> Edit</a>";


            $row[] = $no;
            $row[] = $key->nama_pegawai;
            $row[] = $key->nipp;
            $row[] = $key->jabatan;
            $row[] = $key->status;
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

    public function tambahPegawai()
    {
        $data = [
            'nama_pegawai' => $this->request->getPost('nama_pegawai'),
            'nipp' => $this->request->getPost('nipp'),
            'jabatan' => $this->request->getPost('jabatan'),
            'status' => $this->request->getPost('status'),

        ];

        $this->ModelPegawai->add_data($data);
        session()->setFlashdata('success', 'Data Pegawai berhasil ditambahkan');
        return redirect()->to(base_url('pegawai'));
    }

    public function deletePegawai($id_pegawai)
    {
        $this->ModelPegawai->delete_data($id_pegawai);
        session()->setFlashdata('successDelete', 'Data berhasil dihapus!');
        return redirect()->to(base_url('pegawai'));
    }

    public function editpegawai($id_pegawai)
    {
        $data = [
            'nama_pegawai' => $this->request->getPost('nama_pegawai'),
            'nipp' => $this->request->getPost('nipp'),
            'jabatan' => $this->request->getPost('jabatan'),
            'status' => $this->request->getPost('status'),
        ];
        $this->ModelPegawai->edit_data($data, $id_pegawai);
        session()->setFlashdata('successEdit', 'Data berhasil diupdate!');
        return redirect()->to(base_url('pegawai'));
    }

    public function tambahSkillPegawai()
    {
        $nip_pegawai = $this->request->getPost('pegawai');
        $keahlian = $this->request->getPost('keahlian');
        $file = $this->request->getFile('file_keahlian');
        $detail = $this->request->getPost('detail');
        $fileName = $file->getRandomName();

        $data = [
            'nip_skill' => $nip_pegawai,
            'keahlian' => $keahlian,
            'file_keahlian' => $fileName,
            'detail' => $detail,
        ];

        $this->ModelSkill->add_skill_pegawai($data);
        $file->move('uploaded/fileSkill', $fileName);
        session()->setFlashdata('success', 'Data skill berhasil diupdate');
        return redirect()->to(base_url('data/skill'));
    }


}