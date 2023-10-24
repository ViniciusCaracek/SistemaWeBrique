<?php

namespace App\Models;

use CodeIgniter\Model;

class CategoriaModel extends Model {

    //TABELAS - 
    //Atributos de Configuração
    protected $table = 'categoria';
    protected $primaryKey = 'id_categoria';
    protected $allowedFields = ['descricao'];
    protected $returnType = 'object';

    public function search($pesquisar) {
//$builder = $this->table('pessoa');
//$build->like('nome', $keyword);
//return $builder;
//or

        return $this->table('categorias')->like('id_categoria', $pesquisar)->orLike('descricao', $pesquisar);
    }

}
