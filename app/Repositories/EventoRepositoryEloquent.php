<?php

namespace App\Repositories;

use App\Models\Evento;
use App\Repositories\EventoRepositoryInterface;
use Illuminate\Http\Request;

/*implementa os métodos da interface*/
class EventoRepositoryEloquent implements EventoRepositoryInterface
{
    private $evento;


    public function __construct(Evento $evento)
    {
        $this->evento = $evento;
    }


    public function criarEvento(Request $request)
    {
        return $this->evento->create($request->all());
    }

    public function buscarEvento(int $id)
    {
        return $this->evento
        ->select(
            'id_evento',
            'nome',
            'descricao',
            'data_inicio',
            'data_fim',
            'vagas'

        )
        ->where('id_evento',$id)
        ->get();

    }

    public function buscarTodosEventos()
    {
        return $this->evento
        ->select(
            'id_evento',
            'nome',
            'descricao',
            'data_inicio',
            'data_fim',
            'vagas'
        )
        ->get();
    }

    public function editarEvento(int $id, Request $request)
    {
        return $this->evento
        ->where('id_evento',$id)
        ->update($request->all());
    }

    public function excluirEvento(int $id)
    {
        $evento = $this->evento->find($id);
        return $evento->delete();
    }

}
