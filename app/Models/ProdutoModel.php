<?php

namespace App\Models;

use CodeIgniter\Model;

class ProdutoModel extends Model {

//TABELAS - 
//Atributos de Configuração
protected $table = 'produto';
protected $primaryKey = 'id_produto';
protected $allowedFields = ['preco', 'nome', 'descricao', 'imagem', 'id_categoria', 'id_usuario'];
protected $returnType = 'object';



public function search($pesquisar){
//$builder = $this->table('pessoa');
//$build->like('nome', $keyword);
//return $builder;
//or

return $this->table('produtos')->like('nome', $pesquisar)->orLike('id_produto', $pesquisar)->orLike('descricao', $pesquisar);
}

public function search_user($pesquisar){
//$builder = $this->table('pessoa');
//$build->like('nome', $keyword);
//return $builder;
//or

return $this->table('produtos')->like('nome', $pesquisar)->where('id_usuario', session()->id_usuario);
}



// Mostrar detalhes modificado dia 180121
public function getProduto($id_produto = false){
    if ($id_produto == false){
        return $this->findAll();
    }
    
    return $this->where(['id_produto' => $id_produto])->first();
    
}

// Mostrar detalhes modificado dia 180121
public function getCategoriaProduto($id_categoria = false){
    if ($id_categoria == false){
        return $this->findAll();
    }
    
   $where = "id_categoria= '$id_categoria'";
   $this->where($where);

    
//    return $this->where(['id_categoria' => $id_categoria])->first();
        
}

// Mostrar produto do artesão - perfil - modificado dia 01/02
public function getProdutoPerfil($id_usuario = false){
    if ($id_usuario == false){
        return $this->findAll();
    }
    
   $where = "id_usuario= '$id_usuario'";
   $this->where($where);

    
//    return $this->where(['id_categoria' => $id_categoria])->first();
        
}

// Mostrar produto do artesão - perfil - modificado dia 10/02
//public function getProdutoUsuarioPadrao($id_usuario = false){
//    if ($id_usuario == false){
//        return $this->findAll();
//    }
    
    
//   $id_session = session()->id_usuario;
//   $where = "id_usuario = '12'";
//   $this->where($where);

    
//    return $this->where(['id_categoria' => $id_categoria])->first();
        
//}






//CLAUSULAS PERSONALIZADAS
//$where = "name='Joe' AND status='boss' OR status='active'";
//$builder->where($where);


}
//Ver na documentação QUERY BUILD CLASS CI4