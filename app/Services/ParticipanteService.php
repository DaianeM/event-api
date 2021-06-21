<?php

namespace App\Services;

use Illuminate\Http\Request;
use App\Repositories\ParticipRepositoryInterface;
use Symfony\Component\HttpFoundation\Response;


class ParticipanteService

{
    private $participRepository;


    public function __construct(ParticipRepositoryInterface $participRepository)
    {
        $this->participRepository = $participRepository;
    }


    public function criarParticipante(Request $request)
    {
        try {
            $participante = $this->participRepository->criarParticipante($request);
            return response()->json($participante, Response::HTTP_CREATED);
        }catch(QueryException $e) {
            return response()->json(['erro'=> 'Erro de conexão com o banco'], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }


     /*verifica se contém participante ou vazio e faz o tratamento de erro*/
    public function buscarParticipante($id)
    {
        try {
            $participante = $this->participRepository->buscarParticipante($id);

            if (count($participante) > 0) {
                return response()->json($participante, Response::HTTP_OK);
            } else {
                return response()->json(null, Response::HTTP_NOT_FOUND);
            }
        } catch(QueryException $e) {
            return response()->json(['erro'=> 'Erro de conexão com o banco'], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }


    /*verifica se está retornando uma lista contendo participantes ou uma lista vazia e faz o tratamento de erro*/
    public function buscarTodosParticipantes(int $id)
    {
        try {
            $participantes = $this->participRepository->buscarTodosParticipantes($id);

            if (count($participantes)>0){
                return response()->json($participantes, Response::HTTP_OK);
            }else{
                return response()->json([], Response::HTTP_OK);
            }
       } catch(QueryException $e) {
            return response()->json(['erro'=> 'Erro de conexão com o banco'], Response::HTTP_INTERNAL_SERVER_ERROR);
       }
    }


    public function editarParticipante(int $id, Request $request)
    {
        try {
            $participante = $this->participRepository->editarParticipante($id, $request);
            return response()->json($participante, Response::HTTP_OK);
        } catch(QueryException $e) {
            return response()->json(['erro'=> 'Erro de conexão com o banco'], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }


    public function excluirParticipante($id)
    {
        try {
            $participante = $this->participRepository->excluirParticipante($id);
            return response()->json(null, Response::HTTP_OK);
        } catch(QueryException $e) {
            return response()->json(['erro'=> 'Erro de conexão com o banco'], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }


}
