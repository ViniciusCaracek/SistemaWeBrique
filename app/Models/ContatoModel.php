<?php

namespace App\Models;

use CodeIgniter\Model;

class ContatoModel extends Model {

    //TABELAS - 
    //Atributos de Configuração
    protected $table = 'contato';
    protected $primaryKey = 'id_contato';
    protected $allowedFields = ['email', 'telefone', 'assunto', 'mensagem'];
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

        return $this->table('contatos')->like('email', $pesquisar)->orLike('id_contato', $pesquisar)->orLike('assunto', $pesquisar);
    }

}
