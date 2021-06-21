<?php

namespace App\Repositories;

use Illuminate\Http\Request;

interface ParticipRepositoryInterface
{
    public function criarParticipante(Request $request);
    public function buscarParticipante(int $id);
    public function buscarTodosParticipantes(int $id);
    public function editarParticipante(int $id, Request $request);
    public function excluirParticipante(int $id);

}
