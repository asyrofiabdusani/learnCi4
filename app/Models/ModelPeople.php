<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelPeople extends Model
{
    protected $table      = 'people';
    protected $primaryKey = 'id';

    protected $useAutoIncrement = true;

    protected $returnType     = 'array';

    protected $allowedFields = ['name', 'alamat'];

    public function search($keyword)
    {
        $builder = $this->table('table');
        $builder->like('name', $keyword);
        return $builder;
    }
}