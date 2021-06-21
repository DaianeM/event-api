<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;


class Participante extends Model
{

    protected $table = 'participante';


    protected $fillable = [

        'nome_participante', 'email', 'data_nascimento','id_evento'
    ];


    protected $casts = [

        'data_nascimento' => 'timestamp'
    ];

    protected $primaryKey = 'id_participante';


    public $timestamps = false;
}
