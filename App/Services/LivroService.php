<?php

namespace App\Services;
use App\Models\Livro;
use App\Repository\LivroRepository;
use DI\Attribute\Inject;

class LivroService
{

  #[Inject]
  private LivroRepository $livroRepository;

  public function save(Livro $livro)
  {
    $this->livroRepository->save($livro);

    return 'Livro salvo com sucesso!';
  }

  public function getById(int $id)
  {
    return $this->livroRepository->getById($id);
  }

  public function getAll()
  {
    return $this->livroRepository->getAll();
  }

  public function delete(int $id)
  {
    $this->livroRepository->delete($id);

    return 'Livro excluído com sucesso!';
  }

  public function update(int $id, Livro $livro)
  {
    $this->livroRepository->update($id, $livro);

    return 'Livro atualizado com sucesso!';
  }
}