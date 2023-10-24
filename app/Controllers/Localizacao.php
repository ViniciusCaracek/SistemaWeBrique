<?php

namespace App\Controllers;

class Localizacao extends BaseController {

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

        $db = \Config\Database::connect();
        $builder = $db->table('localizacao l');

        $builder->select('l.id_localizacao, l.latitude, l.longitude, l.logradouro, l.bairro, l.numero, l.cep, l.id_usuario, u.nome, u.nome_profissional');
        $query = $builder->join('cadastro_usuario u', 'l.id_usuario = u.id_usuario')->get();
        $data = $query->getResult();


//        $builder = $db->table('localizacao ');
//
//        $query = $builder->select('*')->limit(100)->get();
//        $data = $query->getResult();

        $markers = [];
        $infowindow = [];

        foreach ($data as $value) {
            $markers[] = [
                $value->logradouro, $value->latitude, $value->longitude
            ];
            $infowindow[] = [
                "<div class='info_content_map' style='padding-left:3px; color:#888;'><h6><i class='fas fa-user'></i> &nbsp <b>" . $value->nome . '<hr>' . $value->nome_profissional . "</b></h6>"
                . "<hr><i class='fas fa-map-signs'></i> Logradouro - " . $value->logradouro . "<br>"
                . "Bairro - " . $value->bairro . "<br>"
                . "Número - " . $value->numero . "<br>"
                . "CEP - " . $value->cep . "<br>"
//                . "USUÁRIO - " . $value->dadosUsuario = session()->id_usuario . "<br>"
                . "<br>"
                . "<div class='col'><a href=./categoria/perfilArtesao/" . $value->id_usuario . "><button type='button' class='btn btn-outline-danger'>"
                . "<p class='p_link_map' style='font-size:14px;'>Visualizar Perfil do Artesão  <i class='fas fa-chevron-right'></i></button></p></a></div>"
                . "</div>"
            ];
        }
        $location['markers'] = json_encode($markers);
        $location['infowindow'] = json_encode($infowindow);


        $data['titulo'] = 'Localização';
        $data['msg'] = '';

        echo view('/template/header.php', $data);
        echo view('principal/localizacao', $location);
        echo view('/template/footer.php');
    }

    public function cadastroLocalizacao() {

        $data['msg'] = '';

        if ($this->request->getMethod() === 'post') {
            $LocalizacaoModel = new \App\Models\LocalizacaoModel();
            $LocalizacaoModel->set('latitude', $this->request->getPost('latitude'));
            $LocalizacaoModel->set('longitude', $this->request->getPost('longitude'));
            $LocalizacaoModel->set('logradouro', $this->request->getPost('logradouro'));
            $LocalizacaoModel->set('bairro', $this->request->getPost('bairro'));
            $LocalizacaoModel->set('numero', $this->request->getPost('numero'));
            $LocalizacaoModel->set('cep', $this->request->getPost('cep'));
            $LocalizacaoModel->set('id_usuario', session()->id_usuario);

            if ($LocalizacaoModel->insert()) {
                //deu certo
                $data['msg'] = '<div class="alert alert-success col-sm-11" role="alert">Dados inseridos com <b>sucesso </b><i class="fas fa-check-circle"></i></div>';
            } else {
                //deu errado
                $data['msg'] = 'Erro ao inserir';
            }
        }

        $data['acao'] = 'Inserir';


        $data['titulo'] = 'Cadastrar Localização';


        echo view('/template/header.php', $data);
        echo view('principal/cadastro_localizacao', $data);
        echo view('/template/footer.php');
    }

//--------------------------------------------------------------------
    ///////////////////////////// SELECT ///////////////////////////////////////
    public function listar_localizacao() {

        //1º passo - Irá chamar uma view que exibe todos os itens
        $LocalizacaoModel = new \App\Models\LocalizacaoModel();
        $data['localizacoes'] = $LocalizacaoModel->find();
        $data['msg'] = $this->session->getFlashdata('msg');

        $data = [
            'localizacoes' => $LocalizacaoModel->paginate(7, 'paginacao'),
            'pager' => $LocalizacaoModel->pager
        ];
        $data['titulo'] = 'Lista de Localizações';
        echo view('/template/dashboard_header.php', $data);
        echo view('dashboard/lista_localizacao', $data);
        echo view('/template/dashboard_footer.php');
    }

    public function listar_localizacao_user() {

        //1º passo - Irá chamar uma view que exibe todos os itens
        $LocalizacaoModel = new \App\Models\LocalizacaoModel();
        $data['localizacoes'] = $LocalizacaoModel->find();

        $db = db_connect();

        $builder = $db->table('localizacao');
        $builder->select('*');
        $consulta = $builder->getWhere(['id_usuario' => session()->id_usuario]);
        $data['consulta'] = $consulta;


//        $data = [
//            'localizacoes' => $LocalizacaoModel->paginate(7, 'paginacao'),
//            'pager' => $LocalizacaoModel->pager
//        ];

        $data['titulo'] = 'Lista de Localizações';
        $data['msg'] = $this->session->getFlashdata('msg');

        if (session()->tipo === 'padrao') {
            echo view('/template/dashboard_header_user.php', $data);
            echo view('dashboard/user/lista_localizacao_user', $data);
            echo view('/template/dashboard_footer.php');
        } else {
            echo view('/template/dashboard_header.php', $data);
            echo view('dashboard/lista_localizacao', $data);
            echo view('/template/dashboard_footer.php');
        }
    }

    ///////////////////////////// UPDATE ///////////////////////////////////////
    public function editar($id_localizacao) {
        $data['titulo'] = 'Editar ' . $id_localizacao;
        $data['acao'] = 'Editar';
        $data['msg'] = '';
        $LocalizacaoModel = new \App\Models\LocalizacaoModel();
        $localizacao = $LocalizacaoModel->find($id_localizacao);


        if ($this->request->getMethod() === 'post') {
            //quando o form for submetido
            $localizacao->latitude = $this->request->getPost('latitude');
            $localizacao->longitude = $this->request->getPost('longitude');
            $localizacao->logradouro = $this->request->getPost('logradouro');
            $localizacao->bairro = $this->request->getPost('bairro');
            $localizacao->numero = $this->request->getPost('numero');
            $localizacao->cep = $this->request->getPost('cep');
//            $localizacao->id_usuario = (session()->id_usuario);



            if ($LocalizacaoModel->update($id_localizacao, $localizacao)) {
                $data['msg'] = ' <div class="alert alert-success" role="alert">Dados editados com <b>sucesso </b><i class="fas fa-check-circle"></i></div>';
            } else {
                $data['msg'] = 'Erro ao editar';
            }
        }

        $data['localizacao'] = $localizacao;



        echo view('/template/header.php', $data);
        echo view('principal/cadastro_localizacao', $data);
        echo view('/template/footer.php');
    }

    ///////////////////////////// DELETE ///////////////////////////////////////
    public function excluir($id_localizacao = null) {

        if (is_null($id_localizacao)) {
            //redirecionar a aplicação para o index
            //definir uma msg via session
            $this->session->setFlashdata('msg', 'não encontrada');
            if (session()->tipo === 'padrao') {
                return redirect()->to(base_url('localizacao/listar_localizacao_user'));
            } else {
                return redirect()->to(base_url('localizacao/listar_localizacao'));
            }
        }

        $LocalizacaoModel = new \App\Models\LocalizacaoModel();
        if ($LocalizacaoModel->delete($id_localizacao)) {
            //excluir com sucesso
            $this->session->setFlashdata('msg', 'excluida com sucesso');
        } else {
            //erro ao excluir
            $this->session->setFlashdata('msg', 'Erro ao excluir');
        }
        if (session()->tipo === 'padrao') {
            return redirect()->to(base_url('localizacao/listar_localizacao_user'));
        } else {
            return redirect()->to(base_url('localizacao/listar_localizacao'));
        }
    }

    public function pesquisarLocalizacao() {

        //1º passo - Irá chamar uma view que exibe todos os itens
        $LocalizacaoModel = new \App\Models\LocalizacaoModel();
        $data['localizacoes'] = $LocalizacaoModel->find();
        $data['acao'] = 'Pesquisar';
        $data['msg'] = $this->session->getFlashdata('msg');

        //getvar para pesquisa
        $pesquisar = $this->request->getVar('pesquisar');
        if ($pesquisar) {
            $localizacao = $LocalizacaoModel->search($pesquisar);
        } else {
            $localizacao = $LocalizacaoModel;
        }

        $data = [
            'localizacoes' => $LocalizacaoModel->paginate(7, 'paginacao'),
            'pager' => $LocalizacaoModel->pager
        ];
        $data['titulo'] = 'Pesquisar Localizaçao';
        echo view('/template/dashboard_header.php', $data);
        echo view('dashboard/pesquisar_localizacao', $data);
        echo view('/template/dashboard_footer.php');
    }

    public function manualLocalizacao() {

        //1º passo - Irá chamar uma view que exibe todos os itens

        $data['titulo'] = 'Manual - Localização';

        echo view('/template/header.php', $data);
        echo view('principal/manual_localizacao', $data);
        echo view('/template/footer.php');
    }

}

//--------------------------------------------------------------------


//    public function resultado_localizacao() {
//        //1º passo - Irá chamar uma view que exibe todos os itens
//        $LocalizacaoModel = new \App\Models\LocalizacaoModel();
//        $data['localizacao'] = $LocalizacaoModel->find();
//        
//
//  
//        $data['titulo'] = 'Localização';
//        echo view('/template/header.php', $data);
//        echo view('principal/localizacao_mostra_xml', $data);
//        echo view('/template/footer.php');
//    }


