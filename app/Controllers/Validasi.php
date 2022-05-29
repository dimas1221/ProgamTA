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
            'title' => 'Hasil Validasi',
            'viewvalidasi' => $viewvalidasi
        ];

        // $data['viewvalidasi'] = $viewvalidasi->paginate(5, 'viewvalidasi');
        // $data['pager'] = $this->validasiModel->pager;


        return view('validasi/index', $data);
    }

    public function insert()
    {
        // session();
        $data = [
            'title' => 'Form input data',
            'validation' => \Config\Services::validation()
        ];
        return view('validasi/pdftext', $data);
    }

    // menyimpan data input khs
    public function save()
    {
        //validasi input
        if (!$this->validate([
            'nama_mahasiswa' =>  [
                'rules' => 'required|is_unique[tb_hasil_validasi.nama_mahasiswa]'
            ],
            'nim_mahasiswa' =>  [
                'rules' => 'required|is_unique[tb_hasil_validasi.nim_mahasiswa]'
            ],
            'hasil_validasi' =>  [
                'rules' => 'required[tb_hasil_validasi.hasil_validasi]'
            ]
            // 'khs' => [
            //     'rules' => 'uploaded[khs]|max_size[khs,5024]|ext_in[khs,pdf]'
            // ]
        ])) {
            // mengambil data hasil validasi field
            $validation = \Config\Services::validation();
            return redirect()->to('/validasi/pdftext')->withInput();
        }

        // //ambil file
        // $filekhs = $this->request->getFile('khs');
        // //pindah file
        // $filekhs->move('fileKHS');
        // //ambil nama file
        // $namakhs = $filekhs->getName();

        // mengambil request apapun
        $this->validasiModel->save([
            'nama_mahasiswa' => $this->request->getVar('nama_mahasiswa'),
            'nim_mahasiswa' => $this->request->getVar('nim_mahasiswa'),
            'prodi' => $this->request->getVar('prodi'),
            'hasil_validasi' => $this->request->getVar('hasil_validasi'),
            // 'khs' => $namakhs
        ]);

        return redirect()->to('/validasi/index')->withInput();
    }

    public function pdftext()
    {
        $data = [
            'title' => 'Validation Page',
        ];
        return view('/validasi/pdftext', $data);
    }

    public function export()
    {
        $viewvalidasi = $this->validasiModel->findAll();

        $data = [
            'viewvalidasi' => $viewvalidasi
        ];

        echo view('validasi/excel', $data);
    }
}
