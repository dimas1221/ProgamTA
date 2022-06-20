<?php

namespace App\Models;

use CodeIgniter\Model;

class ValidasiModel extends Model
{
    // membuat model tb_mahasiswa
    protected $table = 'tb_hasil_validasi';
    protected $primaryKey = 'id_validasi';


    protected $allowedFields = ['nama_mahasiswa', 'nim_mahasiswa', 'prodi', 'hasil_validasi'];

    protected $useTimestamps = true;

    public function search($keyword)
    {
        // $builder = $this->table('tb_hasil_validasi');
        // $builder->like('nama_mahasiswa', $keyword);
        // return $builder;

        // yang lebih simpel
        return $this->table('tb_hasil_validasi')->like('nama_mahasiswa', $keyword);
    }
}
