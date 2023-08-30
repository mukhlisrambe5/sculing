<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ModelBoscu;


class Boscu extends BaseController
{
    public function __construct()
    {
        $this->ModelBoscu = new ModelBoscu();
        helper('form');

    }
    public function index()
    {

        return view('boscu/view');
    }



    public function dataBoscu()
    {

        $model = new ModelBoscu();
        $listing = $model->get_datatables();
        $jumlah_semua = $model->jumlah_semua();
        $jumlah_filter = $model->jumlah_filter();

        $data = array();
        $no = $_POST['start'];
        foreach ($listing as $key) {
            $no++;
            $row = array();

            $tomboledit = "<a class=\"btn btn-md btn-success\" data-toggle=\"modal\" data-target=\"#edit\/$key->id_boscu\"><i class=\"fas fa-arrow-right mr-2\"></i>Input Data</a>";

            $row[] = $no;
            $row[] = $key->tahun;
            $row[] = $key->kuartal;
            $row[] = $this->getName(explode(",", $key->kandidat));
            $row[] = $key->nama_pegawai;
            $row[] = $key->kep;

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

    function getName($array)
    {
        $newArray = [];
        for ($i = 0; $i < count($array); $i++) {
            $data = $this->ModelBoscu->get_name($array[$i]);
            array_push($newArray, $data->nama_pegawai);
        }
        return join(", ", $newArray);
    }

    public function add()
    {
        $data = [
            'pegawai' => $this->ModelBoscu->all_data_pegawai(),
        ];
        return view('boscu/add', $data);
    }

    public function save()
    {
        $tahun = $this->request->getPost('tahun');
        $kuartal = $this->request->getPost('kuartal');
        $kandidat = $this->request->getPost('kandidat');
        $terpilih = $this->request->getPost('terpilih');
        $kep = $this->request->getFile('kep');
        $ket = $this->request->getPost('ket');

        $validation = \Config\Services::validation();

        if (
            $this->validate([
                'tahun' => [
                    'label' => 'Tahun',
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} harus dipilih',
                    ]
                ],

                'kuartal' => [
                    'label' => 'Kuartal',
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} harus dipilih',
                    ]
                ],
                'kandidat' => [
                    'label' => 'Kandidat',
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} harus dipilih',
                    ]
                ],
                'terpilih' => [
                    'label' => 'Terpilih',
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} harus dipilih',
                    ]
                ],
            ])
        ) {
            $nama_kep = $kep->getRandomName();

            $data = [
                'tahun' => $tahun,
                'kuartal' => $kuartal,
                'kandidat' => implode(',', $kandidat),
                'terpilih' => $terpilih,
                'kep' => $nama_kep,
                'ket' => $ket,
            ];
            $kep->move('uploaded/kepBoscu', $nama_kep);
            $this->ModelBoscu->simpandata($data);
            session()->setFlashdata('success', 'Data berhasil ditambahkan !');
            return redirect()->to(base_url('boscu/add'));
        } else {
            session()->setFlashdata('errors', \Config\Services::validation()->getErrors());
            // print_r(\Config\Services::validation()->getError('tahun'));
            return redirect()->to(base_url('boscu/add'))->withInput();
        }
    }

    // public function deletePegawai($id_pegawai)
    // {
    //     $this->ModelPegawai->delete_data($id_pegawai);
    //     session()->setFlashdata('successDelete', 'Data berhasil dihapus!');
    //     return redirect()->to(base_url('pegawai'));
    // }

    // public function rekamFirst($id_pegawai)
    // {
    //     $data = [
    //         'nama_pegawai' => $this->request->getPost('nama_pegawai'),
    //         // 'nip' => $this->request->getPost('nip'),
    //         // 'jabatan' => $this->request->getPost('jabatan'),
    //         // 'status' => $this->request->getPost('status'),
    //     ];
    //     $this->ModelPegawai->input_First($data, $id_pegawai);
    //     session()->setFlashdata('successEdit', 'Data berhasil diupdate!');
    //     return redirect()->to(base_url('First'));
    // }



}