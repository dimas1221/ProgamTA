<?php

namespace App\Models;

use CodeIgniter\Model;

class ValidasiModel extends Model
{
    // membuat model tb_mahasiswa
    protected $table = 'tb_mahasiswa';
    protected $primaryKey = 'id_mhs';


    protected $allowedFields = ['nama_mhs', 'nim', 'khs', 'status_ta'];

    protected $useTimestamps = true;
}
