<?php
namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\TamanhoModel;

class LojaController extends Controller
{
    public function index()
    {
        $tamanhoModel = new TamanhoModel();

        $data = [
            'descricao' => 'M',
        ];

        if ($tamanhoModel->validate($data)) {
            $tamanhoModel->insert($data);
            // var_dump('Inserção bem-sucedida!');
        } else {
            var_dump($tamanhoModel->errors());
        }

        return view('loja/loja');
    }
}