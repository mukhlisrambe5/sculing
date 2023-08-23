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
  


    public function rekamRolling()
    {
        $kep = $this->request->getFile('file');
        $kepName= $kep->getRandomName();
        $data = [
            'nip' => $this->request->getPost('nipp'),
            'unit_now' => $this->request->getPost('unit'),
            'tmt' => $this->request->getPost('tmt'),
            'kep' => $kepName,
        ];
        $kep->move('uploaded/fileKep',  $kepName);
        $this->ModelRolling->add_data($data);
        session()->setFlashdata('successEdit', 'Data berhasil diupdate!');
        return redirect()->to(base_url('data/penempatan'));
    }



}