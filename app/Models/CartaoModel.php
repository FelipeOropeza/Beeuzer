<?php

namespace App\Models;

use CodeIgniter\Model;

class CartaoModel extends Model
{
    protected $table = 'cartoes';
    protected $primaryKey = 'id';
    protected $useAutoIncrement = true;
    protected $returnType = 'array';
    protected $useSoftDeletes = false;
    protected $protectFields = true;
    protected $allowedFields = ['user_id', 'numero_cartao', 'nome_titular', 'validade', 'cvv','tipo_cartao', 'status'];

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
        'nome_titular' => 'required',
        'numero_cartao' => 'required',
        'validade' => 'required',
        'cvv' => 'required|exact_length[3]',
        'tipo_cartao' => 'required',
    ];
    protected $validationMessages = [
        'nome_titular' => [
            'required' => 'O campo nome do titular é obrigatório.',
        ],
        'numero_cartao' => [
            'required' => 'O campo número do cartão é obrigatório.',
        ],
        'validade' => [
            'required' => 'O campo validade é obrigatório.',
        ],
        'cvv' => [
            'required' => 'O campo CVV é obrigatório.',
            'exact_length' => 'O CVV deve ter 3 caracteres.',
        ],
        'tipo_cartao' => [
            'required' => 'O campo tipo do cartão é obrigatório.',
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
