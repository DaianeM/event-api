<?php

namespace App\Repositories;

use App\Models\Evento;
use App\Models\Participante;
use App\Repositories\ParticipRepositoryInterface;
use Illuminate\Http\Request;

class ParticipRepositoryEloquent implements ParticipRepositoryInterface
{
    private $participante;
    private $evento;


    public function __construct(Participante $participante, Evento $evento)
    {
        $this->participante = $participante;
    }


    public function criarParticipante(Request $request)
    {
        return $this->participante->create($request->all());
    }


    public function buscarParticipante(int $id)
    {
        return $this->participante
        ->select(
            'id_participante',
            'nome_participante',
            'email',
            'data_nascimento'
        )
        ->where('id_participante',$id)
        ->get();

    }


    public function buscarTodosParticipantes(int $id)
    {
        return $this->participante
        ->select(
            'nome_participante') 
        ->where('id_evento', $id)
        ->orderBy('nome_participante','asc')
        ->get();
    }

    public function editarParticipante(int $id, Request $request)
    {
        return $this->participante
        ->where('id_participante',$id)
        ->update($request->all());
    }

    public function excluirParticipante(int $id)
    {
        $participante = $this->participante->find($id);
        return $participante->delete();
    }



}
