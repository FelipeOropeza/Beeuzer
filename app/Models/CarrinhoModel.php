<?php
namespace App\Models;

use CodeIgniter\Model;

class CarrinhoModel extends Model
{
    protected $table = 'carrinho';
    protected $primaryKey = 'id';
    protected $allowedFields = ['produto_id', 'quantidade', 'user_id'];
    protected $useTimestamps = true;
}