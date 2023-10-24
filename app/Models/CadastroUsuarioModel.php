<?php

namespace App\Models;

use CodeIgniter\Model;

class CadastroUsuarioModel extends Model {

    //TABELAS - 
    //Atributos de Configuração
    protected $table = 'cadastro_usuario';
    protected $primaryKey = 'id_usuario';
    protected $allowedFields = [
        'email',
        'nome',
        'senha',
        'tipo',
        'nome_profissional',
        'descricao',
        'telefone',
        'data_nascimento',
        'imagem',
        'nome_profissional'
        
    ];
    protected $returnType = 'object'; //ou array

    /**
     * Retorna um usuário pelo seu e-mail
     *
     * @param string $email
     * @return array
     */

    public function getByEmail($email) {
        $rq = $this->where('email', $email)->first();

        return !is_null($rq) ? $rq : '';
    }

//    public function getByEmail(string $email) : array{
//        
//        $requisicao = $this->where('email', $email)->first();
//        
//        return !is_null($requisicao) ? $requisicao : [];
//    }


    public function search($pesquisar) {
//$builder = $this->table('pessoa');
//$build->like('nome', $keyword);
//return $builder;
//or

        return $this->table('cadastro_usuario')->like('email', $pesquisar)->orLike('id_usuario', $pesquisar)->orLike('nome', $pesquisar)->orLike('nome_profissional', $pesquisar);
    }

    // Mostrar detalhes modificado dia 180121
    public function getUsuario($id_usuario = false) {
        if ($id_usuario == false) {
            return $this->findAll();
        }

        return $this->where(['id_usuario' => $id_usuario])->first();
    }

}
