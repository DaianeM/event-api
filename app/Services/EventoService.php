<?php

namespace App\Services;

use Illuminate\Http\Request;
use App\Repositories\EventoRepositoryInterface;
use Symfony\Component\HttpFoundation\Response;

class EventoService
{
    private $eventoRepository;


    public function __construct(EventoRepositoryInterface $eventoRepository)
    {
        $this->eventoRepository = $eventoRepository;
    }


    public function criarEvento(Request $request)
    {
        try {
            $evento = $this->eventoRepository->criarEvento($request);
            return response()->json($evento, Response::HTTP_CREATED);
        }catch(QueryException $e) {
            return response()->json(['erro'=> 'Erro de conexão com o banco'], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    /*verifica se contém evento ou vazio e faz o tratamento de erro*/
    public function buscarEvento($id)
    {
        try {
            $evento = $this->eventoRepository->buscarEvento($id);

            if (count($evento) > 0) {
                return response()->json($evento, Response::HTTP_OK);
            } else {
                return response()->json(null, Response::HTTP_NOT_FOUND);
            }
        } catch(QueryException $e) {
            return response()->json(['erro'=> 'Erro de conexão com o banco'], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }


    /*verifica se está retornando uma lista contendo eventos ou uma lista vazia e faz o tratamento de erro*/
    public function buscarTodosEventos()
    {
       try {
            $eventos = $this->eventoRepository->buscarTodosEventos();

            if (count($eventos)>0){
                return response()->json($eventos, Response::HTTP_OK);
            }else{
                return response()->json([], Response::HTTP_OK);
            }
       } catch(QueryException $e) {
            return response()->json(['erro'=> 'Erro de conexão com o banco'], Response::HTTP_INTERNAL_SERVER_ERROR);
       }
    }


    public function editarEvento(int $id, Request $request)
    {
        try {
            $evento = $this->eventoRepository->editarEvento($id, $request);
            return response()->json($evento, Response::HTTP_OK);
        } catch(QueryException $e) {
            return response()->json(['erro'=> 'Erro de conexão com o banco'], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }


    public function excluirEvento($id)
    {
        try {
            $evento = $this->eventoRepository->excluirEvento($id);
            return response()->json(null, Response::HTTP_OK);
        } catch(QueryException $e) {
            return response()->json(['erro'=> 'Erro de conexão com o banco'], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }



}
