<?php

namespace App\Controllers;

use App\Models\ValidasiModel;

class User extends BaseController
{
    protected $validasiModel;
    public function __construct()
    {
        $this->validasiModel = new ValidasiModel();
    }

    public function index()
    {
        $jumdata = $this->validasiModel->get()->resultID->num_rows;
        $data = [
            'title' => 'Dashboard',
            'jumdata' => $jumdata
        ];
        return view('user/index', $data);
    }
}
