<?php

namespace App\Controllers;

class RedeSocial extends BaseController {

    public function initController(\CodeIgniter\HTTP\RequestInterface $request, \CodeIgniter\HTTP\ResponseInterface $response, \Psr\Log\LoggerInterface $logger) {
// Do Not Edit This Line
        parent::initController($request, $response, $logger);

//--------------------------------------------------------------------
// Preload any models, libraries, etc, here.
//--------------------------------------------------------------------
// E.g.:
        $this->session = \Config\Services::session();
    }

    public function index() {

        //$data['titulo'] = 'Contato'; //modifica head
        /* echo view('/template/header.php');
          echo view('principal/contato');
          echo view('/template/footer.php'); */
        //return view('principal/index');
        //insere
        $data['titulo'] = 'Rede Social';
        $data['acao'] = 'Inserir';
        $data['msg'] = '';


        if ($this->request->getMethod() === 'post') { // verifica se o formulário foi submetido
            $SocialModel = new \App\Models\SocialModel(); // estancia o model
            $SocialModel->set('descricao', $this->request->getPost('descricao'));
            $SocialModel->set('tipo', $this->request->getPost('tipo'));
            $SocialModel->set('id_usuario', session()->id_usuario);


            if ($SocialModel->insert()) {
                //deu certo
                $data['msg'] = '<div class="alert alert-success" role="alert">Dados inseridos com <b>sucesso</b>&nbsp<i class="fas fa-check-circle"></i></div>';
            } else {
                //deu errado
                $data['msg'] = 'Erro ao inserir';
            }
        }


//        helper('form');
//        $arrayCategorias = [];
//        foreach ($listaCategorias as $categoria) {
//            $arrayCategorias[$categoria->id_categoria] = $categoria->descricao; 
//        }
//        $data['comboCategorias'] = form_dropdown('id_categoria', $arrayCategorias); // possui dois parametros 1 o nome da combobox
// 2º o indice do array é um value, o valor é o q vai ser exibido par ao usuario

        if (session()->tipo === 'padrao') {
            echo view('/template/dashboard_header_user.php', $data);
            echo view('dashboard/rede_social_dashboard', $data);
            echo view('/template/dashboard_footer.php');
        } else {
            echo view('/template/dashboard_header.php', $data);
            echo view('dashboard/rede_social_dashboard', $data);
            echo view('/template/dashboard_footer.php');
        }
    }

//--------------------------------------------------------------------
///////////////////////////// SELECT ///////////////////////////////////////
    public function listar_rede_social() {


//1º passo - Irá chamar uma view que exibe todos os itens
        $SocialModel = new \App\Models\SocialModel();
        $data['sociais'] = $SocialModel->find();


        //Paginação
        $data = [
            'sociais' => $SocialModel->paginate(7, 'paginacao'),
            'pager' => $SocialModel->pager
        ];
        $data['titulo'] = 'Lista de Redes Sociais';
        $data['msg'] = $this->session->getFlashdata('msg');



        echo view('/template/dashboard_header.php', $data);
        echo view('dashboard/lista_rede_social', $data);
        echo view('/template/dashboard_footer.php');
    }

    ////////////  LISTAr USUARIO - PADRAO  //////////////////
    public function listar_rede_social_user() {

//1º passo - Irá chamar uma view que exibe todos os itens
        $SocialModel = new \App\Models\SocialModel();
        $data['sociais'] = $SocialModel->find();

        $db = db_connect();

        $builder = $db->table('rede_social');
        $builder->select('*');
        $consulta = $builder->getWhere(['id_usuario' => session()->id_usuario]);
        $data['consulta'] = $consulta;


        //Paginação
//        $data = [
//            'produtos' => $ProdutoModel->paginate(1, 'paginacao'),
//            'pager' => $ProdutoModel->pager,
//        ];


        $data['titulo'] = 'Lista de Redes Sociais';
        $data['msg'] = $this->session->getFlashdata('msg');

//        $data['produtos'] = $ProdutoModel->find();

        if (session()->tipo === 'padrao') {
            echo view('/template/dashboard_header_user.php', $data);
            echo view('dashboard/user/lista_rede_social_user', $data);
            echo view('/template/dashboard_footer.php');
        } else {
            echo view('/template/dashboard_header.php', $data);
            echo view('dashboard/lista_rede_social', $data);
            echo view('/template/dashboard_footer.php');
        }
    }

//    ///////////////////////////// INSERT ///////////////////////////////////////
//    public function inserir() {
//
//        $data['titulo'] = 'Inserir Produto';
//        $data['acao'] = 'Inserir';
//        $data['msg'] = '';
//
//        if ($this->request->getMethod() === 'post') {
//            
//            $ProdutoModel = new \App\Models\ProdutoModel();
//            $ProdutoModel->set('preco', $this->request->getPost('preco'));
//            $ProdutoModel->set('nome', $this->request->getPost('nome'));
//            $ProdutoModel->set('descricao', $this->request->getPost('descricao'));
//            $ProdutoModel->set('imagem', $this->request->getPost('imagem'));
//            $ProdutoModel->set('id_categoria', $this->request->getPost('id_categoria'));
//            $ProdutoModel->set('id_usuario', $this->request->getPost('id_usuario'));
//
//
//            if ($ProdutoModel->insert()) {
//                //deu certo
//                $data['msg'] = 'Dados inseridos com sucesso';
//            } else {
//                //deu errado
//                $data['msg'] = 'Erro ao inserir';
//            }
//        }
//      
//        
//
//        echo view('/template/dashboard_header.php', $data);
//        echo view('dashboard/produto_dashboard', $data);
//        echo view('/template/dashboard_footer.php');
//    }
///////////////////////////// UPDATE ///////////////////////////////////////
    public function editar($id_rede_social) {
        $data['titulo'] = 'Editar ' . $id_rede_social;
        $data['acao'] = 'Editar';
        $data['msg'] = '';
        $SocialModel = new \App\Models\SocialModel();
        $rede_social = $SocialModel->find($id_rede_social);


        if ($this->request->getMethod() === 'post') {
            //quando o form for submetido
            $rede_social->descricao = $this->request->getPost('descricao');
            $rede_social->tipo = $this->request->getPost('tipo');
//            $rede_social->id_usuario = session()->id_usuario;


            if ($SocialModel->update($id_rede_social, $rede_social)) {
                $data['msg'] = '<div class="alert alert-success" role="alert">Dados editados com <b>sucesso</b>&nbsp<i class="fas fa-check-circle"></i></div>';
            } else {
                $data['msg'] = 'Erro ao editar';
            }
        }

        $data['rede_social'] = $rede_social;


        if (session()->tipo === 'padrao') {
            echo view('/template/dashboard_header_user.php', $data);
            echo view('dashboard/rede_social_dashboard', $data);
            echo view('/template/dashboard_footer.php');
        } else {
            echo view('/template/dashboard_header.php', $data);
            echo view('dashboard/rede_social_dashboard', $data);
            echo view('/template/dashboard_footer.php');
        }
    }

///////////////////////////// DELETE ///////////////////////////////////////
    public function excluir($id_rede_social = null) {

        if (is_null($id_rede_social)) {
            //redirecionar a aplicação para o index
            //definir uma msg via session
            $this->session->setFlashdata('msg', 'não encontrada');
            if (session()->tipo === 'padrao') {
                return redirect()->to(base_url('RedeSocial/listar_rede_social_user'));
            } else {
                return redirect()->to(base_url('RedeSocial/listar_rede_social'));
            }
        }

        $SocialModel = new \App\Models\SocialModel();
        if ($SocialModel->delete($id_rede_social)) {
            //excluir com sucesso
            $this->session->setFlashdata('msg', 'excluida com sucesso');
        } else {
            //erro ao excluir
            $this->session->setFlashdata('msg', 'Erro ao excluir');
        }
        if (session()->tipo === 'padrao') {
            return redirect()->to(base_url('RedeSocial/listar_rede_social_user'));
        } else {
            return redirect()->to(base_url('RedeSocial/listar_rede_social'));
        }
    }

//    public function pesquisarProduto() {
//
//        //1º passo - Irá chamar uma view que exibe todos os itens
//        $ProdutoModel = new \App\Models\ProdutoModel();
//        $data['produtos'] = $ProdutoModel->find();
//        $data['acao'] = 'Pesquisar';
//        $data['msg'] = $this->session->getFlashdata('msg');
//
//        //getvar para pesquisa
//        $pesquisar = $this->request->getVar('pesquisar');
//        if ($pesquisar) {
//            $produto = $ProdutoModel->search($pesquisar);
//        } else {
//            $produto = $ProdutoModel;
//        }
//
//        //Paginação
//        $data = [
//            'produtos' => $ProdutoModel->paginate(7, 'paginacao'),
//            'pager' => $ProdutoModel->pager
//        ];
//        $data['titulo'] = 'Pesquisar Produto';
//
//
//
//        if (session()->tipo === 'padrao') {
//            echo view('/template/dashboard_header_user.php', $data);
//            echo view('dashboard/user/pesquisar_produto_user', $data);
//            echo view('/template/dashboard_footer.php');
//        } else {
//            echo view('/template/dashboard_header.php', $data);
//            echo view('dashboard/pesquisar_produto', $data);
//            echo view('/template/dashboard_footer.php');
//        }
//    }
    //modificação feita em 21/02
    public function pesquisarRedeSocial() {

        //1º passo - Irá chamar uma view que exibe todos os itens
        $SocialModel = new \App\Models\SocialModel();
        $data['sociais'] = $SocialModel->find();
        $data['acao'] = 'Pesquisar';
        $data['msg'] = $this->session->getFlashdata('msg');

        //getvar para pesquisa
        $pesquisar = $this->request->getVar('pesquisar');
        if ($pesquisar) {
            $rede_social = $SocialModel->search($pesquisar);
        } else {
            $rede_social = $SocialModel;
        }

        $data = [
            'sociais' => $SocialModel->paginate(7, 'paginacao'),
            'pager' => $SocialModel->pager
        ];

        $data['titulo'] = 'Pesquisar Redes Sociais';

        if (session()->tipo === 'padrao') {
            echo view('/template/dashboard_header_user.php', $data);
            echo view('dashboard/user/pesquisar_rede_social_user', $data);
            echo view('/template/dashboard_footer.php');
        } else {
            echo view('/template/dashboard_header.php', $data);
            echo view('dashboard/pesquisar_rede_social', $data);
            echo view('/template/dashboard_footer.php');
        }
    }

}
