<?php

namespace App\Controllers;

use App\Models\ModelData;
use CodeIgniter\I18n\Time;

class Data extends BaseController
{
    public function __construct()
    {
        $this->ModelData = new ModelData();
        helper('form');
        helper('time');



    }
    public function index()
    {
        $data = [
            'users' => $this->ModelData->all_data(),
        ];
        return view('data/view', $data);
    }

    public function penempatan()
    {
        return view('data/penempatan/view');
    }

    public function dataPenempatan()
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

            $tomboledit = "<a class=\"btn btn-md btn-success\" data-toggle=\"modal\" data-target=\"#edit\/$key->id_penempatan\"><i class=\"fas fa-arrow-right\"></i> Rolling</a>";

            $row[] = $no;
            $row[] = $key->nip;
            $row[] = $key->unit_now;
            $row[] = $key->nip;
            $row[] = $key->nip;
            $row[] = $key->nip;
            // $row[] = Time::parse($key->tmt)->toLocalizedString('dd-MMM-yyyy');
            // $row[] = Time::parse($key->tmt)->difference(Time::parse(date('Y-m-d')))->getYears() . " Tahun " . Time::parse($key->tmt)->difference(Time::parse(date('Y-m-d')))->getMonths() . " BUlan ";

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


}