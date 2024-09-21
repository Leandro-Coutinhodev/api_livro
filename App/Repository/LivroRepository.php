<?php

namespace App\Repository;
use Core\DB\Connection;
use Core\Repository\CRUDRepository;

class LivroRepository extends CRUDRepository
{
  public function __construct()
  {

    $this->DB = (new Connection())->getConnection();
    $this->table = 'livro';
    $this->pk = 'id';
    $this->columns = ['titulo', 'autor', 'editora', 'ano'];
  }
}