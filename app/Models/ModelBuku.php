<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelBuku extends Model
{
    protected $table      = 'daftar_buku';
    protected $primaryKey = 'id_buku';

    protected $useAutoIncrement = true;

    protected $returnType     = 'array';
}