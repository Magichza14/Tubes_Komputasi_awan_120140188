<?php namespace App\Controllers\Api;

use CodeIgniter\RESTful\ResourceController;

class Data extends ResourceController
{
    public function index()
    {
        // Kembalikan data mock sebagai JSON
        return $this->respond(['data' => 'Data dari API - MOCK']);
    }
}