<?php

namespace App\Models;

use CodeIgniter\Model;

class UsuarioModel extends Model
{
    protected $table = 'users';
    protected $primaryKey = 'id';

    protected $allowedFields = [
        'nome',
        'email',
        'senha',
        'is_admin'
    ];

    protected $validationRules = [
        'nome' => 'required|max_length[100]',
        'email' => 'required|valid_email',
        'senha' => 'required|min_length[6]',
    ];

    protected $validationMessages = [
        'nome' => [
            'required' => 'O campo nome é obrigatório.',
            'max_length' => 'O nome não pode ter mais de 100 caracteres.',
        ],
        'email' => [
            'required' => 'O campo e-mail é obrigatório.',
            'valid_email' => 'O e-mail informado não é válido.',
        ],
        'senha' => [
            'required' => 'O campo senha é obrigatório.',
            'min_length' => 'A senha deve ter pelo menos 6 caracteres.',
        ],
    ];

    protected function beforeInsert(array $data)
    {
        $data = $this->hashPassword($data);
        return $data;
    }

    protected function beforeUpdate(array $data)
    {
        $data = $this->hashPassword($data);
        return $data;
    }

    private function hashPassword(array $data)
    {
        if (isset($data['data']['senha'])) {
            $data['data']['senha'] = password_hash($data['data']['senha'], PASSWORD_DEFAULT);
        }
        return $data;
    }
}
