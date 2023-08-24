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
        session()->setFlashdata('successEdit', 'Data berhasil direkam!');
        return redirect()->to(base_url('data/penempatan'));
    }

    public function updateRolling($id_penempatan){
        $kep = $this->request->getFile('file');
        if ($kep->getError() == 4){
            $data = [
                'unit_now' => $this->request->getPost('unit'),
                'tmt' => $this->request->getPost('tmt'),
            ];
        }else{
            $rekaman = $this->ModelRolling->detail_data($id_penempatan);
            if ($rekaman['kep'] != "") {
                unlink('uploaded/fileKep/' . $rekaman['kep']);
            }

            $kepName= $kep->getRandomName();
            $data = [
                'unit_now' => $this->request->getPost('unit'),
                'tmt' => $this->request->getPost('tmt'),
                'kep' => $kepName
            ];
            $kep->move('uploaded/fileKep',  $kepName);

        }
        
        $this->ModelRolling->edit_data($data, $id_penempatan);
        session()->setFlashdata('successEdit', 'Data berhasil diupdate!');
        return redirect()->to(base_url('data/detailPenempatan'));
    }

    // $data = [
    //     'nama_unit' => $this->request->getPost('nama_unit'),

    // ];
    // $this->ModelUnit->edit_data($data, $id_unit);
    // session()->setFlashdata('successEdit', 'Data berhasil diupdate!');
    // return redirect()->to(base_url('unit'));
}