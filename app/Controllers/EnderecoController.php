<?php

namespace App\Controllers;

use CodeIgniter\RESTful\ResourceController;

class EnderecoController extends ResourceController
{
    public function buscarCep($cep)
    {
        $cep = preg_replace('/\D/', '', $cep);

        if (strlen($cep) !== 8) {
            return $this->response
                ->setStatusCode(400)
                ->setJSON(['erro' => 'CEP inválido']);
        }

        $client = \Config\Services::curlrequest();

        $response = $client->get("https://viacep.com.br/ws/{$cep}/json/");

        return $this->response->setJSON(
            json_decode($response->getBody(), true)
        );
    }

}
