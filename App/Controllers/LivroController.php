<?php

namespace App\Controllers;
use App\Models\Livro;
use App\Services\LivroService;
use Core\Adapter\Http;
use Core\Adapter\Request;
use Core\Attributes\RequestMapping;
use DI\Attribute\Inject;

class LivroController
{

  #[Inject]
  private LivroService $livroService;

  #[RequestMapping('/api/livro/salvar', 'POST')]
  public function save()
  {
    try {
      $data = Request::requestBody();
      $livro = new Livro;
      $livro->setTitulo($data['titulo']);
      $livro->setAutor($data['autor']);
      $livro->setEditora($data['editora']);
      $livro->setAno($data['ano']);

      $menssagem = $this->livroService->save($livro);

      return Request::response([
        'menssagem' => $menssagem
      ], 200);

    } catch (\Exception $e) {
      return Request::response([
        'menssagem' => 'Erro ao salvar'
      ], 500);
    }
  }

  #[RequestMapping('/api/livro/listar/{id}', 'GET')]
  public function getById()
  {
    try {

      $id = Request::getUrlParameter('id');

      $data = $this->livroService->getById($id);

      return Request::response($data, 200);
    } catch (\Exception $e) {
      return Request::response([
        'menssagem' => 'Erro ao listar!'
      ], 500);
    }
  }

  #[RequestMapping('/api/livro/listar', 'GET')]
  public function getAll()
  {
    try {
      $data = $this->livroService->getAll();

      return Request::response($data, 200);
    } catch (\Exception $e) {

      return Request::response([
        'menssagem' => 'Erro ao listar!'
      ], 500);
    }
  }

  #[RequestMapping('/api/livro/deletar/{id}', 'DELETE')]
  public function delete()
  {
    try {

      $id = Request::getUrlParameter('id');
      $menssagem = $this->livroService->delete($id);

      return Request::response([
        'menssagem' => $menssagem
      ], 200);
    } catch (\Exception $e) {

      return Request::response([
        'menssagem' => 'Erro ao excluir livro!'
      ], 500);
    }
  }

  #[RequestMapping('/api/livro/atualizar/{id}', 'PUT')]
  public function update()
  {
    try {
      $id = Request::getUrlParameter('id');
      $data = Request::requestBody();

      $livro = new Livro;
      $livro->setTitulo($data['titulo']);
      $livro->setAutor($data['autor']);
      $livro->setEditora($data['editora']);
      $livro->setAno($data['ano']);

      $menssagem = $this->livroService->update($id, $livro);

      return Request::response([
        'menssagem' => $menssagem
      ], 200);

    } catch (\Exception $e) {
      return Request::response([
        'menssagem' => 'Erro ao atualizar!'
      ], 500);
    }
  }
}