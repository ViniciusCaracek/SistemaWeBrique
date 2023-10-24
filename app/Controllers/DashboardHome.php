<?php

namespace App\Controllers;

class DashboardHome extends BaseController {

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

        $ContatoModel = new \App\Models\ContatoModel();
        $contatos = $ContatoModel->find();

        $ProdutoModel = new \App\Models\ProdutoModel();
        $produtos = $ProdutoModel->find();

        $CategoriaModel = new \App\Models\CategoriaModel();
        $categorias = $CategoriaModel->find();

        $LocalizacaoModel = new \App\Models\LocalizacaoModel();
        $localizacoes = $LocalizacaoModel->find();

        $CadastroUsuarioModel = new \App\Models\CadastroUsuarioModel();
        $usuarios = $CadastroUsuarioModel->find();

        $SocialModel = new \App\Models\SocialModel();
        $sociais = $SocialModel->find();

//        $UsuarioModel = new \App\Models\UsuarioModel();
//        $usuarios = $UsuarioModel->find();
//
//        $ProfissionalModel = new \App\Models\ProfissionalModel();
//        $profissionais = $ProfissionalModel->find();



        $data['titulo'] = 'Home - Painel de Controle';
        $data['acao'] = 'Home';
        $data['cont'] = '';

//        $db = \Config\Database::connect();
//        $builder = $db->table('contato');
//        $builder->selectCount('id_contato');
//
//        $builder->get();
//
//        print_r ($query);

        $cont1 = 0;
        $cont2 = 0;
        $cont3 = 0;
        $cont4 = 0;
        $cont5 = 0;
        $cont6 = 0;


        foreach ($contatos as $contato) {

            $cont1++;
            $contato->id_contato;
        }

        foreach ($produtos as $produto) {

            $cont2++;
            $produto->id_produto;
        }

        foreach ($categorias as $categoria) {

            $cont3++;
            $categoria->id_categoria;
        }

        foreach ($localizacoes as $localizacao) {

            $cont4++;
            $localizacao->id_localizacao;
        }


        foreach ($usuarios as $usuario) {

            $cont5++;
            $usuario->id_usuario;
        }

        foreach ($sociais as $social) {

            $cont6++;
            $social->id_rede_social;
        }
//
//        foreach ($profissionais as $profissional) {
//
//            $cont6++;
//            $profissional->id_profissional;
//        }

        $data['cont1'] = $cont1;
        $data['cont2'] = $cont2;
        $data['cont3'] = $cont3;
        $data['cont4'] = $cont4;
        $data['cont5'] = $cont5;
        $data['cont6'] = $cont6;




//        if ($cont == 0) {
//            echo '<p id="color_p">0</p>';
//        } else
//        if ($cont == 1) {
//            echo ' <p id="color_p">' . $cont . ' Registro encontrado</p>';
//        } else {
//            echo ' <p id="color_p">' . $cont . ' Registros encontrados</p>';
//        }
//       $data = $query->getResult();
//$data['titulo'] = 'Contato'; //modifica head

        if (session()->tipo === 'padrao') {
            echo view('/template/dashboard_header_user.php', $data);
            echo view('dashboard/user/index_dashboard_user', $data);
            echo view('/template/dashboard_footer.php');
        } else {
            echo view('/template/dashboard_header.php', $data);
            echo view('dashboard/index_dashboard', $data);
            echo view('/template/dashboard_footer.php');
        }
//return view('principal/index');
    }

    public function DashboardUser() {


        $db = db_connect();

//        $ProdutoModel = new \App\Models\ProdutoModel();
//        $produtos = $ProdutoModel->find();
//
//        $LocalizacaoModel = new \App\Models\LocalizacaoModel();
//        $localizacoes = $LocalizacaoModel->find();
//
//        $CadastroUsuarioModel = new \App\Models\CadastroUsuarioModel();
//        $usuarios = $CadastroUsuarioModel->find();
        
        $builder1 = $db->table('produto');
        $builder1->select('*');
        $consulta1 = $builder1->getWhere(['id_usuario' => session()->id_usuario]);
        $data['consulta'] = $consulta1;

        $builder2 = $db->table('localizacao');
        $builder2->select('*');
        $consulta2 = $builder2->getWhere(['id_usuario' => session()->id_usuario]);
        $data['consulta'] = $consulta2;

        $builder3 = $db->table('cadastro_usuario');
        $builder3->select('*');
        $consulta3 = $builder3->getWhere(['id_usuario' => session()->id_usuario]);
        $data['consulta'] = $consulta3;

        //Rede Social
        $builder4 = $db->table('rede_social');
        $builder4->select('*');
        $consulta4 = $builder4->getWhere(['id_usuario' => session()->id_usuario]);
        $data['consulta'] = $consulta4;


//        $UsuarioModel = new \App\Models\UsuarioModel();
//        $usuarios = $UsuarioModel->find();
//
//        $ProfissionalModel = new \App\Models\ProfissionalModel();
//        $profissionais = $ProfissionalModel->find();



        $data['titulo'] = 'Home - Painel de Controle';
        $data['acao'] = 'Home';
        $data['cont'] = '';

//        $db = \Config\Database::connect();
//        $builder = $db->table('contato');
//        $builder->selectCount('id_contato');
//
//        $builder->get();
//
//        print_r ($query);

        $cont1 = 0;
        $cont2 = 0;

        $cont3 = 0;
        $cont4 = 0;


        foreach ($consulta1->getResult() as $produto) {

            $cont1++;
            $produto->id_produto;
        }

        foreach ($consulta2->getResult() as $localizacao) {

            $cont2++;
            $localizacao->id_localizacao;
        }


        foreach ($consulta3->getResult() as $usuario) {

            $cont3++;
            $usuario->id_usuario;
        }

        foreach ($consulta4->getResult() as $social) {

            $cont4++;
            $social->id_rede_social;
        }
//
//        foreach ($profissionais as $profissional) {
//
//            $cont6++;
//            $profissional->id_profissional;
//        }

        $data['cont1'] = $cont1;
        $data['cont2'] = $cont2;

        $data['cont3'] = $cont3;
        $data['cont4'] = $cont4;




//        if ($cont == 0) {
//            echo '<p id="color_p">0</p>';
//        } else
//        if ($cont == 1) {
//            echo ' <p id="color_p">' . $cont . ' Registro encontrado</p>';
//        } else {
//            echo ' <p id="color_p">' . $cont . ' Registros encontrados</p>';
//        }
//       $data = $query->getResult();
//$data['titulo'] = 'Contato'; //modifica head
        echo view('/template/dashboard_header_user.php', $data);
        echo view('dashboard/user/index_dashboard_user', $data);
        echo view('/template/dashboard_footer.php');
//return view('principal/index');
    }

}
