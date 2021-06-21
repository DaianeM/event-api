<?php

namespace App\Http\Controllers;

use App\Models\Evento;
use Illuminate\Http\Request;
use App\Services\EventoService;

class EventoController extends Controller
{

    private $eventoService;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
     /*métodos que a rota utiliza para acessar o modelo*/



    public function __construct(EventoService $eventoService)
    {
        $this->eventoService = $eventoService;
    }


    public function criarEvento(Request $request)
    {
        $this->eventoService->criarEvento($request);
    }


    public function buscarEvento(int $id)
    {
        return $this->eventoService->buscarEvento($id);
    }


    public function buscarTodosEventos()
    {
        return $this->eventoService->buscarTodosEventos();
    }


    public function editarEvento(int $id, Request $request)
    {
        return $this->eventoService->editarEvento($id, $request);
    }

    public function excluirEvento(int $id)
    {
        return $this->eventoService->excluirEvento($id);
    }
}
