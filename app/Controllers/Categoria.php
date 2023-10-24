<?php

namespace App\Controllers;

class Categoria extends BaseController {

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

        $ProdutoModel = new \App\Models\ProdutoModel();
//
//        $data = [
//            'produto' => $ProdutoModel->getProduto()
//        ];
        //getvar para pesquisa
        $pesquisar = $this->request->getVar('pesquisar');
        if ($pesquisar) {
            $produto = $ProdutoModel->search($pesquisar);
//            return redirect()->to(base_url('categoria'));
        } else {
            $produto = $ProdutoModel;
        }

        $data = [
            'produtos' => $ProdutoModel->paginate(7, 'paginacao'),
            'pager' => $ProdutoModel->pager
        ];
        $CategoriaModel = new \App\Models\CategoriaModel();
        $data['categorias'] = $CategoriaModel->find();



        $data['titulo'] = 'Categorias';
        echo view('/template/header.php', $data);
        echo view('principal/categoria', $data);
        //return view('principal/index');
        echo view('/template/footer.php');
    }

//    public function mostra() {
//        $ProdutoModel = new \App\Models\ProdutoModel();
//
//        $CategoriaModel = new \App\Models\CategoriaModel();
//        $data['categorias'] = $CategoriaModel->find();
//        $data['produtos'] = $ProdutoModel->find();
//        //getvar para pesquisa
////        $categorizar = $this->request->getVar('categoria');
//
//
//        $data['titulo'] = 'Categorias';
//        echo view('/template/header.php', $data);
//        echo view('principal/categoria', $data);
//        //return view('principal/index');
//        echo view('/template/footer.php');
//    }

    public function mostrar($id_categoria) {
        $CategoriaModel = new \App\Models\CategoriaModel();

        $ProdutoModel = new \App\Models\ProdutoModel();
        $data = [
            'titulo' => 'Categorias',
            'produto' => $ProdutoModel->getCategoriaProduto($id_categoria)
        ];

        //getvar para pesquisa
        $pesquisar = $this->request->getVar('pesquisar');
        if ($pesquisar) {
            $produto = $ProdutoModel->search($pesquisar);
//            return redirect()->to(base_url('categoria'));
        } else {
            $produto = $ProdutoModel;
        }

        $data['produtos'] = $ProdutoModel->find();
        $data['categorias'] = $CategoriaModel->find();



        echo view('/template/header.php', $data);
        echo view('principal/categoria_produto', $data);
        //return view('principal/index');
        echo view('/template/footer.php');
    }

    public function detalhes($id_produto) {
        $ProdutoModel = new \App\Models\ProdutoModel();

        $data = [
            'titulo' => 'Detalhes',
            'produto' => $ProdutoModel->getProduto($id_produto)
        ];

        echo view('/template/header.php', $data);
        echo view('principal/detalhes_produto', $data);
        //return view('principal/index');
        echo view('/template/footer.php');
    }

    public function perfilArtesao($id_usuario) {

        $CadastroUsuarioModel = new \App\Models\CadastroUsuarioModel();
        $ProdutoModel = new \App\Models\ProdutoModel();
//        $LocalizacaoModel = new \App\Models\LocalizacaoModel();
        $SocialModel = new \App\Models\SocialModel();

        $data = [
            'titulo' => 'Perfil Artesão',
            'usuario' => $CadastroUsuarioModel->getUsuario($id_usuario),
            'produto' => $ProdutoModel->getProduto(),
//            'localizacao' => $LocalizacaoModel->getLocalizacaoPerfil($id_usuario),
            'social' => $SocialModel->getSocialPerfil($id_usuario)
        ];


//        $data['produtos'] = $ProdutoModel->find();
//        $data['localizacoes'] = $LocalizacaoModel->find();
        $data['sociais'] = $SocialModel->find();



        echo view('/template/header.php', $data);
        echo view('principal/perfil_artesao', $data);
        //return view('principal/index');
        echo view('/template/footer.php');
    }

    public function perfilArtesaoProduto($id_usuario) {

        $CadastroUsuarioModel = new \App\Models\CadastroUsuarioModel();
        $ProdutoModel = new \App\Models\ProdutoModel();


        $data = [
            'titulo' => 'Perfil Artesão',
            'produto' => $ProdutoModel->getProdutoPerfil($id_usuario),
            'usuario' => $CadastroUsuarioModel->getUsuario($id_usuario)
        ];


        $data['produtos'] = $ProdutoModel->find();



        echo view('/template/header.php', $data);
        echo view('principal/perfil_artesao_produto', $data);
        //return view('principal/index');
        echo view('/template/footer.php');
    }

    public function perfilArtesaoLocalizacao($id_usuario) {

        $CadastroUsuarioModel = new \App\Models\CadastroUsuarioModel();
        $LocalizacaoModel = new \App\Models\LocalizacaoModel();


        $data = [
            'titulo' => 'Perfil Artesão',
            'localizacao' => $LocalizacaoModel->getLocalizacaoPerfil($id_usuario),
            'usuario' => $CadastroUsuarioModel->getUsuario($id_usuario)
        ];



        $data['localizacoes'] = $LocalizacaoModel->find();



        echo view('/template/header.php', $data);
        echo view('principal/perfil_artesao_localizacao', $data);
        //return view('principal/index');
        echo view('/template/footer.php');
    }

//    public function pesquisarProduto() {
//        //1º passo - Irá chamar uma view que exibe todos os itens
//        $ProdutoModel = new \App\Models\ProdutoModel();
//        $data['produtos'] = $ProdutoModel->find();
//
//
//        $data['acao'] = 'pesquisar';
//        $data['msg'] = $this->session->getFlashdata('msg');
//
//
//
//        //getvar para pesquisa
//        $pesquisar = $this->request->getVar('pesquisar');
//        if ($pesquisar) {
//            $produto = $ProdutoModel->search($pesquisar);
////            return redirect()->to(base_url('categoria'));
//        } else {
//            $produto = $ProdutoModel;
//        }
//
//        $data = [
//            'produtos' => $ProdutoModel->paginate(7, 'paginacao'),
//            'pager' => $ProdutoModel->pager
//        ];
//        $CategoriaModel = new \App\Models\CategoriaModel();
//        $data['categorias'] = $CategoriaModel->find();
//
//        $data['titulo'] = 'Pesquisar';
////        d($pesquisar);
//        echo view('/template/header.php', $data);
//        echo view('principal/categoria', $data);
//        echo view('/template/footer.php');
//    }
//        $produto = $ProdutoModel->getProduto($id_produto);
//        $produto = $ProdutoModel->Where(['id_produto' => $id_produto])->first();
//        dd($produto);
    //--------------------------------------------------------------------
}
