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

            // $tomboledit = "<a class=\"btn btn-md btn-warning\" data-toggle=\"modal\" data-target=\"#edit\/$key->id_boscu\"><i class=\"fas fa-pencil-alt mr-2\"></i>Edit Data</a>";
            $tomboledit = "<a href=\"./boscu/edit/$key->id_boscu  \" class=\"btn btn-md btn-success \" id=\"tomboledit\"><i class=\"fas fa-edit\"></i> Edit</a>";

            $row[] = $no;
            $row[] = $key->tahun;
            $row[] = $key->kuartal;
            $row[] = $this->getName(explode(",", $key->kandidat));
            $row[] = $key->nama_pegawai;
            $row[] = $key->kep;
            $row[] = $key->ket;

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

    function geKandidat($array)
    {
        $newArray = [];
        for ($i = 0; $i < count($array); $i++) {
            $data = $this->ModelBoscu->get_name($array[$i]);
            array_push($newArray, $data->nama_pegawai);
        }
        return $newArray;
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
    }
    public function edit($id_boscu)
    {
        $data = [
            'boscu' => $this->ModelBoscu->detail($id_boscu),
            'id_kandidat' => (explode(',', implode(',', $this->ModelBoscu->kandidat($id_boscu)))),
            'kandidat' => $this->geKandidat(explode(',', implode(',', $this->ModelBoscu->kandidat($id_boscu)))),
            'pegawai' => $this->ModelBoscu->all_data_pegawai(),
        ];
        return view('boscu/edit', $data);
    }

    public function update($id_boscu)
    {
        $kep = $this->request->getFile('kep');
        if ($kep->getError() == 4) {
            $data = [
                'tahun' => $this->request->getPost('tahun'),
                'kuartal' => $this->request->getPost('kuartal'),
                'kandidat' => implode(',', $this->request->getPost('kandidat')),
                'terpilih' => $this->request->getPost('terpilih'),
                'ket' => $this->request->getPost('ket'),
            ];
        } else {
            $rekaman = $this->ModelBoscu->detail($id_boscu);
            if ($rekaman['kep'] != "") {
                unlink('uploaded/kepBoscu/' . $rekaman['kep']);
            }

            $kepName = $kep->getRandomName();
            $data = [
                'tahun' => $this->request->getPost('tahun'),
                'kuartal' => $this->request->getPost('kuartal'),
                'kandidat' => implode(',', $this->request->getPost('kandidat')),
                'terpilih' => $this->request->getPost('terpilih'),
                'kep' => $kepName,
                'ket' => $this->request->getPost('ket'),
            ];
            $kep->move('uploaded/kepBoscu', $kepName);

        }

        $this->ModelBoscu->edit_data($data, $id_boscu);
        session()->setFlashdata('successEdit', 'Data berhasil diupdate!');
        return redirect()->to(base_url('boscu'));
    }
}