<?php

namespace App\Repositories;

interface RepositoryInterface 
{
    public function index();
    public function create(array $data);
}