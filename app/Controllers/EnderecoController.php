<?php

namespace App\Controllers;

use CodeIgniter\RESTful\ResourceController;

class EnderecoController extends ResourceController
{
    public function buscarCep($cep)
    {
        $url = "https://viacep.com.br/ws/{$cep}/json/";

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        $response = curl_exec($ch);
        curl_close($ch);

        return $this->response->setJSON(json_decode($response));
    }
}
