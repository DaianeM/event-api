<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;             /*O ELOQUENTE É O ORM UTILIZADO PRA PERSISTIR NO BANCO DE DADOS*/


class Evento extends Model
{

    protected $table = 'evento';                     /*TABELA DO BD QUE ESTÁ ASSOCIADA À ENTIDADE EVENTO*/


    protected $fillable = [                                          /*CAMPOS QUE FAZEM REFERÊNCIA ÀS COLUNAS DO BD*/

        'nome','descricao','data_inicio','data_fim','vagas'
    ];


    //protected $casts = [                      /*CONVERTE O FORMATO DATE VINDO DO BD, PARA O FORMATO UNIVERSAL TIMESTAMP*/

    //     'data_inicio' => 'timestamp',
    //     'data_fim' => 'timestamp'
    // ];

    protected $primaryKey = 'id_evento';


    public $timestamps = false;

}
