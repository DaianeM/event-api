<?php

/** @var \Laravel\Lumen\Routing\Router $router */

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It is a breeze. Simply tell Lumen the URIs it should respond to
| and give it the Closure to call when that URI is requested.
|
*/

/*Rota dos endpoints que serão acessados*/

$router->post('/api/evento', 'EventoController@criarEvento');
$router->get('/api/evento/{id}', 'EventoController@buscarEvento');
$router->get('/api/eventos', 'EventoController@buscarTodosEventos');
$router->put('/api/evento/{id}','EventoController@editarEvento');
$router->delete('/api/evento/{id}', 'EventoController@excluirEvento');

$router->post('/api/participante', 'ParticipanteController@criarParticipante');
$router->get('/api/participante/{id}','ParticipanteController@buscarParticipante');
$router->get('/api/participantes/{id}', 'ParticipanteController@buscarTodosParticipantes');
$router->put('/api/participante/{id}','ParticipanteController@editarParticipante');
$router->delete('/api/participante/{id}', 'ParticipanteController@excluirParticipante');

