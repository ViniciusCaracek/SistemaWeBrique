<?php

namespace App\Controllers;

class Cadastro extends BaseController {

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
        //insere
        $data['titulo'] = 'Cadastre-se';
        $data['acao'] = 'Inserir';
        $data['msg'] = '';

        if ($this->request->getMethod() === 'post') {

            //1701 modificado
            //USUARIO
            $CadastroUsuarioModel = new \App\Models\CadastroUsuarioModel();

            $CadastroUsuarioModel->set('nome', $this->request->getPost('nome'));
            $CadastroUsuarioModel->set('email', $this->request->getPost('email'));
            $CadastroUsuarioModel->set('senha', password_hash($this->request->getPost('senha'), PASSWORD_DEFAULT)); //Criptografa
            $CadastroUsuarioModel->set('tipo', $this->request->getPost('tipo'));

            //PROFISSIONAL
//            $ProfissionalModel = new \App\Models\ProfissionalModel();
            $CadastroUsuarioModel->set('nome_profissional', $this->request->getPost('nome_profissional'));
            $CadastroUsuarioModel->set('descricao', $this->request->getPost('descricao'));
            $CadastroUsuarioModel->set('telefone', $this->request->getPost('telefone'));
            $CadastroUsuarioModel->set('data_nascimento', $this->request->getPost('data_nascimento'));
            //inserir imagem
            if ($this->request->getFile('imagem') == '') {
                $this->request->getFile = 'teste-teste.jpg';
            } else {
                $CadastroUsuarioModel->set('imagem', $nome_imagem = $this->request->getFile('imagem')->getRandomName(), 'imagem', $this->request->getFile('imagem')->move('assets/imagens/uploads', $nome_imagem));
            }

//            $CadastroUsuarioModel->set('id_usuario', $this->request->getPost('id_usuario'));


            if ($CadastroUsuarioModel->insert()) {
                //deu certo
                $data['msg'] = '<div class="alert alert-success" role="alert">Dados inseridos com sucesso <i class="fas fa-check-circle"></i></div>';
            } else {
                //deu errado
                $data['msg'] = 'Erro ao inserir ';
            }
        }


        //echo view('principal/cadastro', $data);
        //-----
        echo view('/template/header.php', $data);
        echo view('principal/cadastro', $data);
        //return view('principal/index');
        echo view('/template/footer.php');
    }

    //--------------------------------------------------------------------

    public function listar_usuario() {
        //1º passo - Irá chamar uma view que exibe todas as categorias
        $CadastroUsuarioModel = new \App\Models\CadastroUsuarioModel();
        $data['usuarios'] = $CadastroUsuarioModel->find();
        $data['msg'] = $this->session->getFlashdata('msg');


        $data = [
            'usuarios' => $CadastroUsuarioModel->paginate(7, 'paginacao'),
            'pager' => $CadastroUsuarioModel->pager
        ];

        $data['titulo'] = 'Lista de usuários';
        echo view('/template/dashboard_header.php', $data);
        echo view('dashboard/lista_cadastro_usuario', $data);
        echo view('/template/dashboard_footer.php');
    }

    public function listar_usuario_user() {
        //1º passo - Irá chamar uma view que exibe todas as categorias
        $CadastroUsuarioModel = new \App\Models\CadastroUsuarioModel();
        $data['usuarios'] = $CadastroUsuarioModel->find();

        $db = db_connect();

        $builder = $db->table('cadastro_usuario');
        $builder->select('*');
        $consulta = $builder->getWhere(['id_usuario' => session()->id_usuario]);
        $data['consulta'] = $consulta;


//        $data = [
//            'usuarios' => $CadastroUsuarioModel->paginate(7, 'paginacao'),
//            'pager' => $CadastroUsuarioModel->pager
//        ];

        $data['titulo'] = 'Lista de usuários';
        $data['msg'] = $this->session->getFlashdata('msg');

        if (session()->tipo === 'padrao') {
            echo view('/template/dashboard_header_user.php', $data);
            echo view('dashboard/user/lista_cadastro_usuario_user', $data);
            echo view('/template/dashboard_footer.php');
        } else {
            echo view('/template/dashboard_header.php', $data);
            echo view('dashboard/lista_cadastro_usuario', $data);
            echo view('/template/dashboard_footer.php');
        }
    }

    public function mostra_cadastro_usuario($id_usuario) {


        //1º passo - Irá chamar uma view que exibe todas as categorias
        $CadastroUsuarioModel = new \App\Models\CadastroUsuarioModel();
        $data['usuarios'] = $CadastroUsuarioModel->find();

        $db = db_connect();

        $builder = $db->table('cadastro_usuario');
        $builder->select('*');
        $consulta = $builder->getWhere(['id_usuario' => $id_usuario]);
        $data['consulta'] = $consulta;

        $data['titulo'] = 'Lista de Usuários';

//        print_r($data->getResultArray());
        //Se for padrao mostra apenas itens para usuarios comuns
        if (session()->tipo === 'padrao') {
            echo view('/template/dashboard_header_user.php', $data);
            echo view('dashboard/detalhe_cadastro_usuario', $data);
            echo view('/template/dashboard_footer.php');
        } else {
            echo view('/template/dashboard_header.php', $data);
            echo view('dashboard/detalhe_cadastro_usuario', $data);
            echo view('/template/dashboard_footer.php');
        }
    }

    /* public function inserir() {

      $data['titulo'] = 'Inserir Usuario';
      $data['acao'] = 'Inserir';
      $data['msg'] = '';

      if ($this->request->getMethod() === 'post') {
      $UsuarioModel = new \App\Models\UsuarioModel();
      $UsuarioModel->set('nome', $this->request->getPost('nome'));
      $UsuarioModel->set('email', $this->request->getPost('email'));
      $UsuarioModel->set('senha', $this->request->getPost('senha'));
      $UsuarioModel->set('tipo', $this->request->getPost('tipo'));

      if ($UsuarioModel->insert()) {
      //deu certo
      $data['msg'] = 'inserida com sucesso';
      } else {
      //deu errado
      $data['msg'] = 'Erro ao inserir ';
      }
      }


      echo view('principal/cadastro', $data);
      }; */

//('senha', password_hash ($this->request->getPost('senha'), PASSWORD_DEFAULT));
    public function editar($id_usuario) {
        $data['titulo'] = 'Editar Usuario ' . $id_usuario;
        $data['acao'] = 'Editar';
        $data['msg'] = '';
        $CadastroUsuarioModel = new \App\Models\CadastroUsuarioModel();
        $usuario = $CadastroUsuarioModel->find($id_usuario);


        if ($this->request->getMethod() === 'post') {
            //quando o form for submetido
            //Usuario
            $usuario->nome = $this->request->getPost('nome');
            $usuario->email = $this->request->getPost('email');
//            $usuario->senha = $this->request->getPost('senha');
            $usuario->senha = password_hash($this->request->getPost('senha'), PASSWORD_DEFAULT);
            $usuario->tipo = $this->request->getPost('tipo');

            //Profissional
            $usuario->nome_profissional = $this->request->getPost('nome_profissional');
            $usuario->descricao = $this->request->getPost('descricao');
            $usuario->telefone = $this->request->getPost('telefone');
            $usuario->data_nascimento = $this->request->getPost('data_nascimento');

            //editar imagem
            if ($this->request->getFile('imagem') == '') {
                $this->request->getFile = 'teste-teste.jpg';
            } else {

                $nome_imagem = $usuario->imagem = $this->request->getFile('imagem')->getRandomName();

                $this->request->getFile('imagem')->move('assets/imagens/uploads', $nome_imagem);


//                $ProdutoModel->set('imagem', $this->request->getFile('imagem')->move('assets/imagens/uploads'));
//                $ProdutoModel->set('imagem', $this->request->getFile('imagem')->move('assets/imagens/uploads'));
//               $ProdutoModel->set('imagem', $this->request->getFile('imagem')->getRandomName());
            }


            if ($CadastroUsuarioModel->update($id_usuario, $usuario)) {
                $data['msg'] = '<div class="alert alert-success" role="alert">Dados editados com sucesso <i class="fas fa-check-circle"></i></div>';
            } else {
                $data['msg'] = 'Erro ao editar ';
            }
        }

        $data['usuario'] = $usuario;
        echo view('/template/header.php', $data);
        echo view('principal/cadastro', $data);
        echo view('/template/footer.php');
    }

    public function excluir($id_usuario = null) {

        if (is_null($id_usuario)) {
            //redirecionar a aplicação para o categorias/index
            //definir uma msg via session
            $this->session->setFlashdata('msg', 'não encontrada');
            return redirect()->to(base_url('public/cadastro'));
        }

        $CadastroUsuarioModel = new \App\Models\CadastroUsuarioModel();
        if ($CadastroUsuarioModel->delete($id_usuario)) {
            //excluir com sucesso
            $this->session->setFlashdata('msg', 'Excluida com sucesso');
        } else {
            //erro ao excluir
            $this->session->setFlashdata('msg', 'Erro ao excluir');
        }
        return redirect()->to(base_url('cadastro/listar_usuario'));
    }

    public function pesquisarUsuario() {

        //1º passo - Irá chamar uma view que exibe todos os itens
        $CadastroUsuarioModel = new \App\Models\CadastroUsuarioModel();
        $data['usuarios'] = $CadastroUsuarioModel->find();
        $data['acao'] = 'Pesquisar';
        $data['msg'] = $this->session->getFlashdata('msg');

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
        $data['titulo'] = 'Pesquisar Usuario';
        echo view('/template/dashboard_header.php', $data);
        echo view('dashboard/pesquisar_cadastro_usuario', $data);
        echo view('/template/dashboard_footer.php');
    }

}
