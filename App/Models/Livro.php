<?php

namespace App\Models;
use Core\Models\Models;

class Livro extends Models
{

  private string $titulo;
  private string $autor;
  private string $editora;
  private int $ano;

  public function getTitulo(): string
  {
    return $this->titulo;
  }

  public function setTitulo(string $value)
  {
    $this->titulo = $value;
  }

  public function getAutor(): string
  {
    return $this->autor;
  }

  public function setAutor(string $value)
  {
    $this->autor = $value;
  }

  public function getEditora(): string
  {
    return $this->editora;
  }

  public function setEditora(string $value)
  {
    $this->editora = $value;
  }

  public function getAno(): int
  {
    return $this->ano;
  }

  public function setAno(int $value)
  {
    $this->ano = $value;
  }
}