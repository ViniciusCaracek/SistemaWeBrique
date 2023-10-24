<?php

namespace App\Controllers;

class Profissional extends BaseController {

    public function initController(\CodeIgniter\HTTP\RequestInterface $request, \CodeIgniter\HTTP\ResponseInterface $response, \Psr\Log\LoggerInterface $logger) {
// Do Not Edit This Line
        parent::initController($request, $response, $logger);

//--------------------------------------------------------------------
// Preload any models, libraries, etc, here.
//--------------------------------------------------------------------
// E.g.:
        $this->session = \Config\Services::session();
    }

    ///////////////////////////// INSERT ///////////////////////////////////////
    public function index() {

        //$data['titulo'] = 'Contato'; //modifica head
        /* echo view('/template/header.php');
          echo view('principal/contato');
          echo view('/template/footer.php'); */
        //return view('principal/index');

        $data['titulo'] = 'Contato';
        $data['acao'] = 'Inserir';
        $data['msg'] = '';

        if ($this->request->getMethod() === 'post') {
            $ContatoModel = new \App\Models\ContatoModel();
            $ContatoModel->set('email', $this->request->getPost('email'));
            $ContatoModel->set('telefone', $this->request->getPost('telefone'));
            $ContatoModel->set('assunto', $this->request->getPost('assunto'));
            $ContatoModel->set('mensagem', $this->request->getPost('mensagem'));


            if ($ContatoModel->insert()) {
                //deu certo
                $data['msg'] = '<div class="alert alert-success" role="alert">Dados inseridos com <b>sucesso </b><i class="fas fa-check-circle"></i></div>';
            } else {
                //deu errado
                $data['msg'] = 'Erro ao inserir';
            }
        }

        echo view('/template/header.php', $data);
        echo view('principal/contato', $data);
        echo view('/template/footer.php');
    }

//--------------------------------------------------------------------
    ///////////////////////////// SELECT ///////////////////////////////////////
    public function listar_contato() {

        //1º passo - Irá chamar uma view que exibe todos os itens
        $ContatoModel = new \App\Models\ContatoModel();
        $data['contatos'] = $ContatoModel->find();
        $data['msg'] = $this->session->getFlashdata('msg');

        $data = [
            'contatos' => $ContatoModel->paginate(7, 'paginacao'),
            'pager' => $ContatoModel->pager
        ];
        $data['titulo'] = 'Lista de Contatos';
        echo view('/template/dashboard_header.php', $data);
        echo view('dashboard/lista_contato', $data);
        echo view('/template/dashboard_footer.php');
    }

    ///////////////////////////// UPDATE ///////////////////////////////////////
    public function editar($id_contato) {
        $data['titulo'] = 'Editar' . $id_contato;
        $data['acao'] = 'Editar';
        $data['msg'] = '';
        $ContatoModel = new \App\Models\ContatoModel();
        $contato = $ContatoModel->find($id_contato);


        if ($this->request->getMethod() === 'post') {
            //quando o form for submetido
            $contato->email = $this->request->getPost('email');
            $contato->telefone = $this->request->getPost('telefone');
            $contato->assunto = $this->request->getPost('assunto');
            $contato->mensagem = $this->request->getPost('mensagem');
            if ($ContatoModel->update($id_contato, $contato)) {
                $data['msg'] = ' <div class="alert alert-success" role="alert">Dados editados com <b>sucesso </b><i class="fas fa-check-circle"></i></div>';
            } else {
                $data['msg'] = 'Erro ao editar';
            }
        }

        $data['contato'] = $contato;

        echo view('/template/header.php', $data);
        echo view('principal/contato', $data);
        echo view('/template/footer.php');
    }

    ///////////////////////////// DELETE ///////////////////////////////////////
    public function excluir($id_contato = null) {

        if (is_null($id_contato)) {
            //redirecionar a aplicação para o index
            //definir uma msg via session
            $this->session->setFlashdata('msg', 'não encontrada');
            return redirect()->to(base_url('contato/listar_contato'));
        }

        $ContatoModel = new \App\Models\ContatoModel();
        if ($ContatoModel->delete($id_contato)) {
            //excluir com sucesso
            $this->session->setFlashdata('msg', 'excluida com sucesso');
        } else {
            //erro ao excluir
            $this->session->setFlashdata('msg', 'Erro ao excluir');
        }
        return redirect()->to(base_url('contato/listar_contato'));
    }

    public function pesquisarContato() {

        //1º passo - Irá chamar uma view que exibe todos os itens
        $ContatoModel = new \App\Models\ContatoModel();
        $data['contatos'] = $ContatoModel->find();
        $data['acao'] = 'Pesquisar';
        $data['msg'] = $this->session->getFlashdata('msg');

        //getvar para pesquisa
        $pesquisar = $this->request->getVar('pesquisar');
        if ($pesquisar) {
            $contato = $ContatoModel->search($pesquisar);
        } else {
            $contato = $ContatoModel;
        }

        $data = [
            'contatos' => $ContatoModel->paginate(7, 'paginacao'),
            'pager' => $ContatoModel->pager
        ];
        $data['titulo'] = 'Pesquisar Contato';
        echo view('/template/dashboard_header.php', $data);
        echo view('dashboard/pesquisar_contato', $data);
        echo view('/template/dashboard_footer.php');
    }

}
