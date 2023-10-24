<?php

namespace App\Controllers;

class Home extends BaseController {

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
        //1º passo - Irá chamar uma view que exibe todas as categorias
        $CadastroUsuarioModel = new \App\Models\CadastroUsuarioModel();

//getvar para pesquisa
        $pesquisar = $this->request->getVar('pesquisar');
        if ($pesquisar) {
            $usuario = $CadastroUsuarioModel->search($pesquisar);
        } else {
            $usuario = $CadastroUsuarioModel;
        }

        $data = [
            'usuarios' => $CadastroUsuarioModel->paginate(7, 'paginacao'),
            'pager' => $CadastroUsuarioModel->pager
        ];

       
        
        $db = \Config\Database::connect();
        $builder = $db->table('produto');

        $query = $builder->select("*")->limit(3)->orderby('id_produto', 'DESC')->get();

        $resultado = $query->getResult();

        $data['produtos'] = $resultado;

        $data['titulo'] = 'Página Inicial';


        echo view('/template/header.php', $data);
        echo view('principal/index', $data);
        //return view('principal/index');
        echo view('/template/footer.php');
    }

    public function sobre() {

        $data['titulo'] = 'Sobre';


        echo view('/template/header.php', $data);
        echo view('principal/sobre', $data);
        //return view('principal/index');
        echo view('/template/footer.php');
    }

    public function PerfilArtesaoLista() {
//1º passo - Irá chamar uma view que exibe todas as categorias
        $CadastroUsuarioModel = new \App\Models\CadastroUsuarioModel();

//getvar para pesquisa
        $pesquisar = $this->request->getVar('pesquisar');
        if ($pesquisar) {
            $usuario = $CadastroUsuarioModel->search($pesquisar);
        } else {
            $usuario = $CadastroUsuarioModel;
        }

        $data = [
            'usuarios' => $CadastroUsuarioModel->paginate(7, 'paginacao'),
            'pager' => $CadastroUsuarioModel->pager
        ];
//        $data['usuarios'] = $CadastroUsuarioModel->find();
        $data['msg'] = $this->session->getFlashdata('msg');
        $data['titulo'] = 'Perfis dos Artesãos';


        echo view('/template/header.php', $data);
        echo view('principal/perfil_artesao_lista', $data);
        //return view('principal/index');
        echo view('/template/footer.php');
    }

//    public function pesquisarLocalizacao() {
//
//        //1º passo - Irá chamar uma view que exibe todos os itens
//        $LocalizacaoModel = new \App\Models\LocalizacaoModel();
//        $data['localizacoes'] = $LocalizacaoModel->find();
//        $data['acao'] = 'Pesquisar';
//        $data['msg'] = $this->session->getFlashdata('msg');
//
//        //getvar para pesquisa
//        $pesquisar = $this->request->getVar('pesquisar');
//        if ($pesquisar) {
//            return redirect()->to(base_url('localizacao'));
//            $localizacao = $LocalizacaoModel->search($pesquisar);
//            
//        } else {
//            $localizacao = $LocalizacaoModel;
//        }
//
//        $data = [
//            'localizacoes' => $LocalizacaoModel->paginate(7, 'paginacao'),
//            'pager' => $LocalizacaoModel->pager
//        ];
//
//        $db = \Config\Database::connect();
//        $builder = $db->table('produto');
//        $query = $builder->select("*")->limit(3)->get();
//        $resultado = $query->getResult();
//
//        $data['produtos'] = $resultado;
//
//
//        $data['titulo'] = 'Pesquisar Localizaçao';
//
//        echo view('/template/header.php', $data);
//        echo view('principal/index', $data);
//        echo view('/template/footer.php');
//    }
    //--------------------------------------------------------------------
}
