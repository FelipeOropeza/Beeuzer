<?php

namespace App\Models;

use CodeIgniter\Model;

class CorModel extends Model
{
    protected $table      = 'cores';
    protected $primaryKey = 'id';

    protected $allowedFields = ['nome', 'created_at', 'updated_at'];

    protected $useTimestamps = true;

    protected $validationRules = [
        'nome' => 'required|max_length[50]',
    ];

    protected $validationMessages = [
        'nome' => [
            'required' => 'O nome da cor é obrigatório.',
            'max_length' => 'O nome da cor não pode ter mais de 50 caracteres.',
        ],
    ];
}
