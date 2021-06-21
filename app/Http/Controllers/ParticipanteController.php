<?php

namespace App\Http\Controllers;

use App\Models\Participante;
use Illuminate\Http\Request;
use App\Services\ParticipanteService;


class ParticipanteController extends Controller
{

    private $participanteService;

    /**
     * Create a new controller instance.
     *
     * @return void
     */

    public function __construct(ParticipanteService $participanteService)
    {
        $this->participanteService = $participanteService;
    }


    public function criarParticipante(Request $request)
    {
        $this->participanteService->criarParticipante($request);
    }


    public function buscarParticipante(int $id)
    {
        return $this->participanteService->buscarParticipante($id);
    }


    public function buscarTodosParticipantes(int $id)
    {
        return $this->participanteService->buscarTodosParticipantes($id);
    }


    public function editarParticipante(int $id, Request $request)
    {
        return $this->participanteService->editarParticipante($id, $request);
    }

    public function excluirParticipante(int $id)
    {
        return $this->participanteService->excluirParticipante($id);
    }




}
