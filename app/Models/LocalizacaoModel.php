<?php

namespace App\Models;

use CodeIgniter\Model;

class LocalizacaoModel extends Model {

    //TABELAS - 
    //Atributos de Configuração
    protected $table = 'localizacao';
    protected $primaryKey = 'id_localizacao';
    protected $allowedFields = ['latitude', 'longitude', 'logradouro', 'bairro', 'numero', 'cep', 'id_usuario'];
    protected $returnType = 'object';

//Modificado no dia 20/11
//    public function get_contato_like() {
//
//        $consulta = $this->input->post('pesquisa_contato');
//        $this->db->select('*');
//        $this->db->like('id_contato', $consulta);
//        return $this->db->get('Contato')->result();
//    }
//Modificado no dia 12/12
//
    //modificado 04/01/21
    public function search($pesquisar) {
//$builder = $this->table('pessoa');
//$build->like('nome', $keyword);
//return $builder;
//or

        return $this->table('localizacao')->like('bairro', $pesquisar)->orLike('id_localizacao', $pesquisar)->orLike('logradouro', $pesquisar);
    }

    // Mostrar produto do artesão - perfil - modificado dia 01/02
    public function getLocalizacaoPerfil($id_usuario = false) {
        if ($id_usuario == false) {
            return $this->findAll();
        }

        $where = "id_usuario= '$id_usuario'";
        $this->where($where);


//    return $this->where(['id_categoria' => $id_categoria])->first();
    }
    


}
