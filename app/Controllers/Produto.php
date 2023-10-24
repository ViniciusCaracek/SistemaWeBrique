<?php

namespace App\Controllers;

class Produto extends BaseController {

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
        $data['titulo'] = 'Produto';
        $data['acao'] = 'Inserir';
        $data['msg'] = '';


        if ($this->request->getMethod() === 'post') { // verifica se o formulário foi submetido
            $ProdutoModel = new \App\Models\ProdutoModel(); // estancia o model
            $ProdutoModel->set('preco', $this->request->getPost('preco'));
            $ProdutoModel->set('nome', $this->request->getPost('nome'));
            $ProdutoModel->set('descricao', $this->request->getPost('descricao'));

            //inserir imagem
            if ($this->request->getFile('imagem') == '') {
                $this->request->getFile = 'teste-teste.jpg';
            } else {

                $ProdutoModel->set(
                        'imagem', $descr_imagem = $this->request->getFile('imagem')->getRandomName(), 'imagem', $this->request->getFile('imagem')->move('assets/imagens/uploads', $descr_imagem)
                );

//                $ProdutoModel->set('imagem', $this->request->getFile('imagem')->move('assets/imagens/uploads'));
//                $ProdutoModel->set('imagem', $this->request->getFile('imagem')->move('assets/imagens/uploads'));
//               $ProdutoModel->set('imagem', $this->request->getFile('imagem')->getRandomName());
            }

            $ProdutoModel->set('id_categoria', $this->request->getPost('id_categoria'));

//            <?php echo session()->id_usuario 
            $ProdutoModel->set('id_usuario', session()->id_usuario);

            if ($ProdutoModel->insert()) {
                //deu certo
                $data['msg'] = '<div class="alert alert-success" role="alert">Dados inseridos com <b>sucesso</b>&nbsp<i class="fas fa-check-circle"></i></div>';
            } else {
                //deu errado
                $data['msg'] = 'Erro ao inserir';
            }
        }


        //para incluir o atributo de referencia no formulario
        $categoriaModel = new \App\Models\CategoriaModel();
        $listaCategorias = $categoriaModel->findAll();
        $data['listaCategorias'] = $listaCategorias;


//        helper('form');
//        $arrayCategorias = [];
//        foreach ($listaCategorias as $categoria) {
//            $arrayCategorias[$categoria->id_categoria] = $categoria->descricao; 
//        }
//        $data['comboCategorias'] = form_dropdown('id_categoria', $arrayCategorias); // possui dois parametros 1 o nome da combobox
// 2º o indice do array é um value, o valor é o q vai ser exibido par ao usuario

        if (session()->tipo === 'padrao') {
            echo view('/template/dashboard_header_user.php', $data);
            echo view('dashboard/produto_dashboard', $data);
            echo view('/template/dashboard_footer.php');
        } else {
            echo view('/template/dashboard_header.php', $data);
            echo view('dashboard/produto_dashboard', $data);
            echo view('/template/dashboard_footer.php');
        }
    }

//--------------------------------------------------------------------
///////////////////////////// SELECT ///////////////////////////////////////
    public function listar_produto() {


//1º passo - Irá chamar uma view que exibe todos os itens
        $ProdutoModel = new \App\Models\ProdutoModel();
        $data['produtos'] = $ProdutoModel->find();


        //Paginação
        $data = [
            'produtos' => $ProdutoModel->paginate(7, 'paginacao'),
            'pager' => $ProdutoModel->pager
        ];
        $data['titulo'] = 'Lista de Produtos';
        $data['msg'] = $this->session->getFlashdata('msg');



        echo view('/template/dashboard_header.php', $data);
        echo view('dashboard/lista_produto', $data);
        echo view('/template/dashboard_footer.php');
    }

    ////////////  LISTAr USUARIO - PADRAO  //////////////////
    public function listar_produto_user() {

//1º passo - Irá chamar uma view que exibe todos os itens
        $ProdutoModel = new \App\Models\ProdutoModel();
        $data['produtos'] = $ProdutoModel->find();

        $db = db_connect();

        $builder = $db->table('produto');
        $builder->select('*');
        $consulta = $builder->getWhere(['id_usuario' => session()->id_usuario]);

        $data['consulta'] = $consulta;

//        Paginação
//        $data = [
//            'produtos' => $ProdutoModel->paginate(1, 'paginacao'),
//            'pager' => $ProdutoModel->pager,
//        ];


        $data['titulo'] = 'Lista de Produtos';
        $data['msg'] = $this->session->getFlashdata('msg');

//        $data['produtos'] = $ProdutoModel->find();

        if (session()->tipo === 'padrao') {
            echo view('/template/dashboard_header_user.php', $data);
            echo view('dashboard/user/lista_produto_user', $data);
            echo view('/template/dashboard_footer.php');
        } else {
            echo view('/template/dashboard_header.php', $data);
            echo view('dashboard/lista_produto', $data);
            echo view('/template/dashboard_footer.php');
        }
    }

    public function mostra_categoria($id_produto) {


        $ProdutoModel = new \App\Models\ProdutoModel();
        $data['produtos'] = $ProdutoModel->find();

        $data['titulo'] = 'Lista de Produtos';

        $db = db_connect();

        $builder = $db->table('categoria c');

        $builder->select('c.id_categoria, c.descricao, p.nome, p.id_produto, p.preco, p.imagem');

        $builder->join('produto p', 'p.id_categoria = c.id_categoria');

        $consulta = $builder->getWhere(['id_produto' => $id_produto]);


        $data['consulta'] = $consulta;
//        print_r($data->getResultArray());
        //Se for padrao mostra apenas itens para usuarios comuns
        if (session()->tipo === 'padrao') {
            echo view('/template/dashboard_header_user.php', $data);
            echo view('dashboard/detalhe_lista_produto', $data);
            echo view('/template/dashboard_footer.php');
        } else {
            echo view('/template/dashboard_header.php', $data);
            echo view('dashboard/detalhe_lista_produto', $data);
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
    public function editar($id_produto) {
        $data['titulo'] = 'Editar ' . $id_produto;
        $data['acao'] = 'Editar';
        $data['msg'] = '';
        $ProdutoModel = new \App\Models\ProdutoModel();
        $produto = $ProdutoModel->find($id_produto);


        if ($this->request->getMethod() === 'post') {
            //quando o form for submetido
            $produto->preco = $this->request->getPost('preco');
            $produto->nome = $this->request->getPost('nome');
            $produto->descricao = $this->request->getPost('descricao');
            $produto->id_categoria = $this->request->getPost('id_categoria');

            //editar imagem
            if ($this->request->getFile('imagem') == '') {
                $this->request->getFile = 'teste-teste.jpg';
            } else {

                $descr_imagem = $produto->imagem = $this->request->getFile('imagem')->getRandomName();

                $this->request->getFile('imagem')->move('assets/imagens/uploads', $descr_imagem);


//                $ProdutoModel->set('imagem', $this->request->getFile('imagem')->move('assets/imagens/uploads'));
//                $ProdutoModel->set('imagem', $this->request->getFile('imagem')->move('assets/imagens/uploads'));
//               $ProdutoModel->set('imagem', $this->request->getFile('imagem')->getRandomName());
            }



            if ($ProdutoModel->update($id_produto, $produto)) {
                $data['msg'] = '<div class="alert alert-success" role="alert">Dados editados com <b>sucesso </b>&nbsp<i class="fas fa-check-circle"></i></div>';
            } else {
                $data['msg'] = 'Erro ao editar';
            }
        }

        //para incluir o atributo de referencia no formulario
        $categoriaModel = new \App\Models\CategoriaModel();
        $listaCategorias = $categoriaModel->findAll();
        $data['listaCategorias'] = $listaCategorias;
        $data['produto'] = $produto;

        if (session()->tipo === 'padrao') {
            echo view('/template/dashboard_header_user.php', $data);
            echo view('dashboard/produto_dashboard', $data);
            echo view('/template/dashboard_footer.php');
        } else {
            echo view('/template/dashboard_header.php', $data);
            echo view('dashboard/produto_dashboard', $data);
            echo view('/template/dashboard_footer.php');
        }
    }

///////////////////////////// DELETE ///////////////////////////////////////
    public function excluir($id_produto = null) {

        if (is_null($id_produto)) {
            //redirecionar a aplicação para o index
            //definir uma msg via session
            $this->session->setFlashdata('msg', 'não encontrada');
            if (session()->tipo === 'padrao') {
                return redirect()->to(base_url('produto/listar_produto_user'));
            } else {
                return redirect()->to(base_url('produto/listar_produto'));
            }
        }

        $ProdutoModel = new \App\Models\ProdutoModel();
        if ($ProdutoModel->delete($id_produto)) {
            //excluir com sucesso
            $this->session->setFlashdata('msg', 'excluida com sucesso');
        } else {
            //erro ao excluir
            $this->session->setFlashdata('msg', 'Erro ao excluir');
        }

        if (session()->tipo === 'padrao') {
            return redirect()->to(base_url('produto/listar_produto_user'));
        } else {
            return redirect()->to(base_url('produto/listar_produto'));
        }
    }

    public function pesquisarProduto() {

        //1º passo - Irá chamar uma view que exibe todos os itens
        $ProdutoModel = new \App\Models\ProdutoModel();
        $data['produtos'] = $ProdutoModel->find();
        $data['acao'] = 'Pesquisar';
        $data['msg'] = $this->session->getFlashdata('msg');

        //getvar para pesquisa
        $pesquisar = $this->request->getVar('pesquisar');
        if ($pesquisar) {
            $produto = $ProdutoModel->search($pesquisar);
        } else {
            $produto = $ProdutoModel;
        }

        //Paginação
        $data = [
            'produtos' => $ProdutoModel->paginate(7, 'paginacao'),
            'pager' => $ProdutoModel->pager
        ];
        $data['titulo'] = 'Pesquisar Produto';



        if (session()->tipo === 'padrao') {
            echo view('/template/dashboard_header_user.php', $data);
            echo view('dashboard/user/pesquisar_produto_user', $data);
            echo view('/template/dashboard_footer.php');
        } else {
            echo view('/template/dashboard_header.php', $data);
            echo view('dashboard/pesquisar_produto', $data);
            echo view('/template/dashboard_footer.php');
        }
    }

    //modificação feita em 21/02
    public function pesquisarProdutoUser() {

        //1º passo - Irá chamar uma view que exibe todos os itens
        $ProdutoModel = new \App\Models\ProdutoModel();
//        $data['produtos'] = $ProdutoModel->find();


        $db = db_connect();

        $builder = $db->table('produto');
        $builder->select('*');
        $consulta = $builder->getWhere(['id_usuario' => session()->id_usuario]);
        $data['consulta'] = $consulta;

        //getvar para pesquisa
        $pesquisar = $this->request->getVar('pesquisar');
        if ($pesquisar) {
            $produto = $ProdutoModel->search_user($pesquisar);
        } else {
            $produto = $ProdutoModel;
        }

//        Paginação
//        $data = [
//            'consulta' => $ProdutoModel->paginate(),
//            'pager' => $ProdutoModel->pager
//            'consulta' => $consulta
//        ];

        $data['acao'] = 'Pesquisar';
        $data['titulo'] = 'Pesquisar Produto';
        $data['msg'] = $this->session->getFlashdata('msg');

        if (session()->tipo === 'padrao') {
            echo view('/template/dashboard_header_user.php', $data);
            echo view('dashboard/user/pesquisar_produto_user', $data);
            echo view('/template/dashboard_footer.php');
        } else {
            echo view('/template/dashboard_header.php', $data);
            echo view('dashboard/pesquisar_produto', $data);
            echo view('/template/dashboard_footer.php');
        }
    }

}
