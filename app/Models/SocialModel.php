<?php

namespace App\Models;

use CodeIgniter\Model;

class SocialModel extends Model {

    //TABELAS - 
    //Atributos de Configuração
    protected $table = 'rede_social';
    protected $primaryKey = 'id_rede_social';
    protected $allowedFields = ['descricao', 'tipo', 'id_usuario'];
    protected $returnType = 'object'; //ou array

    public function search($pesquisar) {
//$builder = $this->table('pessoa');
//$build->like('nome', $keyword);
//return $builder;
//or

        return $this->table('rede_social')->like('id_rede_social', $pesquisar)->orLike('tipo', $pesquisar)->orLike('descricao', $pesquisar);
    }
    
        // Mostrar produto do artesão - perfil - modificado dia 01/02
    public function getSocialPerfil($id_usuario = false) {
        if ($id_usuario == false) {
            return $this->findAll();
        }

        $where = "id_usuario= '$id_usuario'";
        $this->where($where);


//    return $this->where(['id_categoria' => $id_categoria])->first();
    }
    

}
