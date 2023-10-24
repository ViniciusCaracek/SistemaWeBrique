<?php

namespace App\Models;

class ProfissionalModel extends UsuarioModel {

    //TABELAS - 
    //Atributos de Configuração
    protected $table = 'profissional';
    protected $primaryKey = 'id_usuario';
    protected $allowedFields = [
        'nome',
        'descricao',
        'telefone',
        'data_nascimento',
        'nome_profissional',
        'imagem',
        
    ];
    protected $returnType = 'object';


}
