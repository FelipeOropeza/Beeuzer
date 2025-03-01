<?php

namespace App\Models;

use CodeIgniter\Model;

class EnderecoModel extends Model
{
    protected $table = 'enderecos';
    protected $primaryKey = 'id';
    protected $useAutoIncrement = true;
    protected $returnType = 'array';
    protected $useSoftDeletes = false;
    protected $protectFields = true;
    protected $allowedFields = ['rua', 'cidade', 'estado', 'cep'];

    protected bool $allowEmptyInserts = false;
    protected bool $updateOnlyChanged = true;

    protected array $casts = [];
    protected array $castHandlers = [];

    // Dates
    protected $useTimestamps = false;
    protected $dateFormat = 'datetime';
    protected $createdField = 'created_at';
    protected $updatedField = 'updated_at';
    protected $deletedField = 'deleted_at';

    // Validation
    protected $validationRules = [
        'rua' => 'required',
        'cidade' => 'required',
        'estado' => 'required',
        'cep' => 'required',
    ];
    protected $validationMessages = [
        'rua' => [
            'required' => 'O campo rua é obrigatório.',
        ],
        'cidade' => [
            'required' => 'O campo cidade é obrigatório.',
        ],
        'estado' => [
            'required' => 'O campo estado é obrigatório.',
        ],
        'cep' => [
            'required' => 'O campo cep é obrigatório.',
        ],
    ];
    protected $skipValidation = false;
    protected $cleanValidationRules = true;

    // Callbacks
    protected $allowCallbacks = true;
    protected $beforeInsert = [];
    protected $afterInsert = [];
    protected $beforeUpdate = [];
    protected $afterUpdate = [];
    protected $beforeFind = [];
    protected $afterFind = [];
    protected $beforeDelete = [];
    protected $afterDelete = [];
}
