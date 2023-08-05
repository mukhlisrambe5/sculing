<?php

namespace App\Controllers;

use App\Models\ModelData;

class Data extends BaseController
{
    public function __construct()
    {
        $this->ModelData = new ModelData();
        helper('form');


    }
    public function index()
    {
        $data = [
            'users' => $this->ModelData->all_data(),
        ];
        return view('data/view', $data);
    }



    public function dataBase()
    {

        $model = new ModelData();
        $listing = $model->get_datatables();
        $jumlah_semua = $model->jumlah_semua();
        $jumlah_filter = $model->jumlah_filter();

        $data = array();
        $no = $_POST['start'];
        foreach ($listing as $key) {
            $no++;
            $row = array();

            $tomboledit = "<a href=\"./data/editData/$key->id_data  \" class=\"btn btn-md btn-success \" id=\"tomboledit\"><i class=\"fas fa-edit\"></i> Edit</a>";

            $tomboldelete = "<a href=\"./data/deleteData/$key->id_data  \" class=\"btn btn-md btn-danger \" id=\"tomboldelete\" onclick=\"return confirm('Yakin ingin menghapus data user: $key->elemenVar?')\"><i class=\"fas fa-trash\"></i> Delete</a>";



            $row[] = $no;
            $row[] = $key->elemenVar;
            $row[] = $key->elemenNum;
            $row[] = $key->elementSelect;
            $row[] = $key->elementRadio;
            $row[] = $key->elementCheck;
            $row[] = $key->elementTextArea;
            // $key->str_replace(",", "-", $key->elementTextArea);
            $row[] = $key->elementDate;
            $row[] = "<a href=\"./data/downloadImage/$key->id_data\" target=\"_blank\" ><img src=\"./data/downloadImage/$key->id_data\" width=\"200px\" height=\"200px\" /> </a>";
            $row[] = "<a href=\"./data/downloadFile/$key->id_data\" target=\"_blank\" >$key->elementFile</a>";
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

    public function tambahData()
    {
        return view('data/tambahData');
    }

    public function SimpanData()
    {
        if (
            $this->validate([
                'elemenVar' => [
                    'label' => 'elemenVar',
                    'rules' => 'required|min_length[4]',
                    'errors' => [
                        'required' => '{field} Harus Diisi',
                        'min_length' => '{field} Minimal 4 karakter'
                    ]
                ],
                'elemenNum' => [
                    'label' => 'elemenNum',
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} Harus Diisi',
                    ]
                ],
                'elementSelect' => [
                    'label' => 'elementSelect',
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} harus dipilih',
                    ]
                ],
                'elementRadio' => [
                    'label' => 'elementRadio',
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} harus dipilih',
                    ]
                ],
                'elementCheck' => [
                    'label' => 'elementCheck',
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} harus dipilih minimal 1',
                    ]
                ],
                'elementDate' => [
                    'label' => 'elementDate',
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} Harus Diisi',
                    ]
                ],
                'elementImg' => [
                    'label' => 'elementImg',
                    'rules' => 'max_size[elementImg, 2056]|mime_in[elementImg,image/png,image/jpeg]',
                    'errors' => [
                        'max_size' => '{field} maksimal 2MB',
                        'mime_in' => 'Format {field} harus dalam png/jpeg'
                    ]
                ],
                'elementFile' => [
                    'label' => 'elementFile',
                    'rules' => 'max_size[elementFile, 2056]|mime_in[elementFile,application/pdf]',
                    'errors' => [
                        'max_size' => '{field} maksimal 2MB',
                        'mime_in' => 'Format {field} harus dalam pdf'
                    ]
                ],
            ])
        ) {
            $elemenVar = $this->request->getPost('elemenVar');
            $elemenNum = $this->request->getPost('elemenNum');
            $elementSelect = $this->request->getPost('elementSelect');
            $elementRadio = $this->request->getPost('elementRadio');
            $elementCheck = implode("<br>" ,(array)$this->request->getPost('elementCheck'));
            $elementTextArea = $this->request->getPost('elementTextArea');
            $elementDate = $this->request->getPost('elementDate');
            $elementImg = $this->request->getFile('elementImg');
            $elementFile = $this->request->getFile('elementFile');

            $elementImgName = $elementImg->getRandomName();
            $elementFileName = $elementFile->getRandomName();

            $data = [
                'elemenVar' => $elemenVar,
                'elemenNum' => $elemenNum,
                'elementSelect' => $elementSelect,
                'elementRadio' => $elementRadio,
                'elementCheck' => $elementCheck,
                'elementTextArea' => $elementTextArea,
                'elementDate' => $elementDate,
                'elementImg' => $elementImgName,
                'elementFile' => $elementFileName
            ];

            $elementImg->move('uploaded/image',  $elementImgName);
            $elementFile->move('uploaded/file',  $elementFileName);

            $this->ModelData->add_data($data);
            session()->setFlashdata('success', 'Data berhasil ditambahkan');
            return redirect()->to('data');

        } else {
            session()->setFlashdata('errors', \Config\Services::validation()->getErrors());
            return redirect()->to(base_url('data/tambahData'))->withInput();
        }
    }
    
   
    public function editData($id_data)
        {
            
            $data = [
                'users' => $this->ModelData->detail($id_data),
                
            ];
            return view('data/editData', $data);
        }

        public function updateData()
        {
            if (
                $this->validate([
                    'elemenVar' => [
                        'label' => 'elemenVar',
                        'rules' => 'required|min_length[4]',
                        'errors' => [
                            'required' => '{field} Harus Diisi',
                            'min_length' => '{field} Minimal 4 karakter'
                        ]
                    ],
                    'elemenNum' => [
                        'label' => 'elemenNum',
                        'rules' => 'required',
                        'errors' => [
                            'required' => '{field} Harus Diisi',
                        ]
                    ],
                    'elementSelect' => [
                        'label' => 'elementSelect',
                        'rules' => 'required',
                        'errors' => [
                            'required' => '{field} harus dipilih',
                        ]
                    ],
                    'elementRadio' => [
                        'label' => 'elementRadio',
                        'rules' => 'required',
                        'errors' => [
                            'required' => '{field} harus dipilih',
                        ]
                    ],
                    'elementCheck' => [
                        'label' => 'elementCheck',
                        'rules' => 'required',
                        'errors' => [
                            'required' => '{field} harus dipilih minimal 1',
                        ]
                    ],
                    'elementDate' => [
                        'label' => 'elementDate',
                        'rules' => 'required',
                        'errors' => [
                            'required' => '{field} Harus Diisi',
                        ]
                    ],
                    'elementImg' => [
                        'label' => 'elementImg',
                        'rules' => 'max_size[elementImg, 2056]|mime_in[elementImg,image/png,image/jpeg]',
                        'errors' => [
                            'max_size' => '{field} maksimal 2MB',
                            'mime_in' => 'Format {field} harus dalam png/jpeg'
                        ]
                    ],
                    'elementFile' => [
                        'label' => 'elementFile',
                        'rules' => 'max_size[elementFile, 2056]|mime_in[elementFile,application/pdf]',
                        'errors' => [
                            'max_size' => '{field} maksimal 2MB',
                            'mime_in' => 'Format {field} harus dalam pdf'
                        ]
                    ],
                ])
            ){
                $id_data = $this->request->getPost('id_data');
                $elemenVar = "Tes Update";
                $elemenNum = $this->request->getPost('elemenNum');
                $elementSelect = $this->request->getPost('elementSelect');
                $elementRadio = $this->request->getPost('elementRadio');
                $elementCheck = implode("<br>" ,(array)$this->request->getPost('elementCheck'));
                $elementTextArea = $this->request->getPost('elementTextArea');
                $elementDate = $this->request->getPost('elementDate');
                $elementImg = $this->request->getFile('elementImg');
                $elementFile = $this->request->getFile('elementFile');

                $elementImgName = $elementImg->getRandomName();
                $elementFileName = $elementFile->getRandomName();
                $berkas = $this->ModelData->detail($id_data);


                if($elementImg->getError() ==4 && $elementFile->getError()==4){
                    $data = [
                        'id_data' => $id_data,
                        'elemenVar' => $elemenVar,
                        'elemenNum' => $elemenNum,
                        'elementSelect' => $elementSelect,
                        'elementRadio' => $elementRadio,
                        'elementCheck' => $elementCheck,
                        'elementTextArea' => $elementTextArea,
                        'elementDate' => $elementDate,
                    ];
                }

                else if($elementFile->getError()==4){
                    $data = [
                        'id_data' => $id_data,
                        'elemenVar' => $elemenVar,
                        'elemenNum' => $elemenNum,
                        'elementSelect' => $elementSelect,
                        'elementRadio' => $elementRadio,
                        'elementCheck' => $elementCheck,
                        'elementTextArea' => $elementTextArea,
                        'elementDate' => $elementDate,
                        'elementImg' => $elementImgName,
                    ];
                    if($berkas['elementImg'] !== ""){
                        unlink('uploaded/image/'. $berkas['elementImg'] );
                    }
                    $elementImg->move('uploaded/image',  $elementImgName);
                }
                else if($elementImg->getError()==4){
                    $data = [
                        'id_data' => $id_data,
                        'elemenVar' => $elemenVar,
                        'elemenNum' => $elemenNum,
                        'elementSelect' => $elementSelect,
                        'elementRadio' => $elementRadio,
                        'elementCheck' => $elementCheck,
                        'elementTextArea' => $elementTextArea,
                        'elementDate' => $elementDate,
                        'elementFile' => $elementFileName,
                    ];
                    if($berkas['elementFile'] !== ""){
                        unlink('uploaded/file/'. $berkas['elementFile'] );
                    }
                    $elementFile->move('uploaded/file',  $elementFileName);
                }
                else{
                    $data = [
                        'id_data' => $id_data,
                        'elemenVar' => $elemenVar,
                        'elemenNum' => $elemenNum,
                        'elementSelect' => $elementSelect,
                        'elementRadio' => $elementRadio,
                        'elementCheck' => $elementCheck,
                        'elementTextArea' => $elementTextArea,
                        'elementDate' => $elementDate,
                        'elementImg' => $elementImgName,
                        'elementFile' => $elementFileName,
                    ];
                    if($berkas['elementImg'] !== ""){
                        unlink('uploaded/image/'. $berkas['elementImg'] );
                    }
                    if($berkas['elementFile'] !== ""){
                        unlink('uploaded/file/'. $berkas['elementFile'] );
                    }
                    $elementImg->move('uploaded/image',  $elementImgName);
                    $elementFile->move('uploaded/file',  $elementFileName);

                }
                $this->ModelData->update_data($data);
                session()->setFlashData('successUpdate', 'Data berhasil diupdate');
                return redirect()->to('data');
            }else{
                session()->setFlashdata('errors', \Config\Services::validation()->getErrors());
                return redirect()->to(base_url('data/editData/' .$id_data))->withInput();
            }
        }

    public function deleteData($id_data)
        {
            $berkas= $this->ModelData->detail($id_data);
            $dataImage= $berkas['elementImg'];
            $dataFile= $berkas['elementFile'];

            unlink('uploaded/image/' .$dataImage);
            unlink('uploaded/file/' .$dataFile);


            $this->ModelData->delete_data($id_data);
            session()->setFlashdata('successDelete', 'Data berhasil dihapus!');
            return redirect()->to(base_url('data'));
        }

    function downloadImage($id){
        $berkas= $this->ModelData->detail($id);
        $data= $berkas['elementImg'];

        // direct donwload
        // return $this->response->download('uploaded/image/' .$data,null);

        // open in new tab
        return redirect()->to('uploaded/image/' .$data);

    }

    function downloadFile($id){
        $berkas= $this->ModelData->detail($id);
        $data= $berkas['elementFile'];

        // direct donwload
        // return $this->response->download('uploaded/file/' .$data,null);

        // open in new tab
        return redirect()->to('uploaded/file/' .$data);
    }

}