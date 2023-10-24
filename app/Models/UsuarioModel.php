<?php

namespace App\Models;

use CodeIgniter\Model;

class UsuarioModel extends Model {

   
        //TABELAS - 
        //Atributos de Configuração
        protected $table = 'usuario';
        protected $primaryKey = 'id_usuario';
        protected $allowedFields = ['email', 'nome', 'senha', 'tipo'];
        protected $returnType = 'object'; //ou array
    

}
