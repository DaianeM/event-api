<?php

namespace App\Repositories;

use Illuminate\Http\Request;

interface EventoRepositoryInterface
{
    public function criarEvento(Request $request);
    public function buscarEvento(int $id);
    public function buscarTodosEventos();
    public function editarEvento(int $id, Request $request);
    public function excluirEvento(int $id);

}
