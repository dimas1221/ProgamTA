<?php

namespace App\Controllers;

use App\Models\ValidasiModel;

class Validasi extends BaseController
{
    protected $validasiModel;
    public function __construct()
    {
        $this->validasiModel = new ValidasiModel();
    }
    public function index()
    {

        // $validasiModel = new ValidasiModel();

        //view data validasi mhs
        $viewvalidasi = $this->validasiModel->findAll();

        $data = [
            'viewvalidasi' => $viewvalidasi
        ];

        return view('validasi/index', $data);
    }

    public function insert()
    {
        // session();
        $data = [
            'title' => 'Form input data',
            'validation' => \Config\Services::validation()
        ];
        return view('validasi/pengajuan_ta', $data);
    }

    // menyimpan data input khs
    public function save()
    {
        //validasi input
        if (!$this->validate([
            'nama_mhs' =>  [
                'rules' => 'required|is_unique[tb_mahasiswa.nama_mhs]'
            ],
            'khs' => [
                'rules' => 'uploaded[khs]|max_size[khs,5024]|ext_in[khs,pdf]'
            ]
        ])) {
            // mengambil data hasil validasi field
            $validation = \Config\Services::validation();
            return redirect()->to('/validasi/pengajuan_ta')->withInput();
        }

        //ambil file
        $filekhs = $this->request->getFile('khs');
        //pindah file
        $filekhs->move('fileKHS');
        //ambil nama file
        $namakhs = $filekhs->getName();
        // mengambil request apapun
        $this->validasiModel->save([
            'nama_mhs' => $this->request->getVar('nama_mhs'),
            'nim' => $this->request->getVar('nim'),
            'khs' => $namakhs
        ]);

        return redirect()->to('/validasi/pengajuan_ta')->withInput();
    }

    public function pdftext()
    {
        return view('/validasi/pdftext');
    }
}
