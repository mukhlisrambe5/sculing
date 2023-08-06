<?php

namespace App\Controllers;

use App\Models\ModelPegawai;
use App\Models\ModelPenempatan;


class Penempatan extends BaseController
{
    public function __construct()
    {
        $this->ModelPegawai = new ModelPegawai();
        $this->ModelPenempatan = new ModelPenempatan();

        helper('form');


    }
    public function index()
    {
        $data = [
            'penempatan' => $this->ModelPenempatan->all_data(),
            'pegawai' => $this->ModelPegawai->all_data(),
        ];
        return view('penempatan/view', $data);
    }


    // public function dataPegawai()
    // {

    //     $model = new ModelPegawai();
    //     $listing = $model->get_datatables();
    //     $jumlah_semua = $model->jumlah_semua();
    //     $jumlah_filter = $model->jumlah_filter();

    //     $data = array();
    //     $no = $_POST['start'];
    //     foreach ($listing as $key) {
    //         $no++;
    //         $row = array();

    //         $tomboldelete = "<a href=\"./pegawai/deletePegawai/$key->id_pegawai  \" class=\"btn btn-md btn-danger \" id=\"tomboldelete\" onclick=\"return confirm('Yakin ingin menghapus data pegawai: $key->nama_pegawai?')\"><i class=\"fas fa-trash\"></i> Delete</a>";
    //         $tomboledit = "<a class=\"btn btn-md btn-warning\" data-toggle=\"modal\" data-target=\"#edit\/$key->id_pegawai\"><i class=\"fas fa-edit\"></i> Edit</a>";


    //         $row[] = $no;
    //         $row[] = $key->nama_pegawai;
    //         $row[] = $key->nip;
    //         $row[] = $key->jabatan;
    //         $row[] = $key->status;
    //         $row[] = "<div class=\"text-center\">" . $tomboledit . " " . $tomboldelete . "</div>";
    //         $data[] = $row;
    //     }
    //     $output = array(
    //         "draw" => $_POST['draw'],
    //         "recordsTotal" => $jumlah_semua->jml,
    //         "recordsFiltered" => $jumlah_filter->jml,
    //         "data" => $data,
    //     );
    //     echo json_encode($output);

    // }

    // public function tambahPegawai()
    // {
    //     $data = [
    //         'nama_pegawai' => $this->request->getPost('nama_pegawai'),
    //         'nip' => $this->request->getPost('nip'),
    //         'jabatan' => $this->request->getPost('jabatan'),
    //         'status' => $this->request->getPost('status'),

    //     ];

    //     $this->ModelPegawai->add_data($data);
    //     session()->setFlashdata('success', 'Data Pegawai berhasil ditambahkan');
    //     return redirect()->to(base_url('pegawai'));
    // }

    // public function deletePegawai($id_pegawai)
    // {
    //     $this->ModelPegawai->delete_data($id_pegawai);
    //     session()->setFlashdata('successDelete', 'Data berhasil dihapus!');
    //     return redirect()->to(base_url('pegawai'));
    // }

    // public function editpegawai($id_pegawai)
    // {
    //     $data = [
    //         'nama_pegawai' => $this->request->getPost('nama_pegawai'),
    //         'nip' => $this->request->getPost('nip'),
    //         'jabatan' => $this->request->getPost('jabatan'),
    //         'status' => $this->request->getPost('status'),
    //     ];
    //     $this->ModelPegawai->edit_data($data, $id_pegawai);
    //     session()->setFlashdata('successEdit', 'Data berhasil diupdate!');
    //     return redirect()->to(base_url('pegawai'));
    // }



}