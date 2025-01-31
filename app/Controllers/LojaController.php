<?php
namespace App\Controllers;

use CodeIgniter\Controller;

class LojaController extends Controller
{
    public function index()
    {
        return view(name: 'loja');
    }
}