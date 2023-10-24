<?php

namespace App\Controllers;

class CategoriaController extends BaseController {

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
        ///////////////////////////// INSERT ///////////////////////////////////////
        $data['titulo'] = 'Categoria';
        $data['acao'] = 'Inserir';
        $data['msg'] = '';

        if ($this->request->getMethod() === 'post') {
            $CategoriaModel = new \App\Models\CategoriaModel();
            $CategoriaModel->set('descricao', $this->request->getPost('descricao'));




            if ($CategoriaModel->insert()) {
                //deu certo
                $data['msg'] = '<div class="alert alert-success" role="alert">Dados inseridos com <b>sucesso </b><i class="fas fa-check-circle"></i></div>';
            } else {
                //deu errado
                $data['msg'] = 'Erro ao inserir';
            }
        }

        echo view('/template/dashboard_header.php', $data);
        echo view('dashboard/categoria_dashboard', $data);
        echo view('/template/dashboard_footer.php');
    }

//--------------------------------------------------------------------
    ///////////////////////////// SELECT ///////////////////////////////////////
    public function listar_categoria() {

        //1º passo - Irá chamar uma view que exibe todos os itens
        $CategoriaModel = new \App\Models\CategoriaModel();
        $data['categorias'] = $CategoriaModel->find();

        $data['msg'] = $this->session->getFlashdata('msg');
        $data = [
            'categorias' => $CategoriaModel->paginate(7, 'paginacao'),
            'pager' => $CategoriaModel->pager
        ];
        $data['titulo'] = 'Lista de Categorias';
        echo view('/template/dashboard_header.php', $data);
        echo view('dashboard/lista_categoria', $data);
        echo view('/template/dashboard_footer.php');
    }

    ///////////////////////////// UPDATE ///////////////////////////////////////
    public function editar($id_categoria) {
        $data['titulo'] = 'Editar' . $id_categoria;
        $data['acao'] = 'Editar';
        $data['msg'] = '';
        $CategoriaModel = new \App\Models\CategoriaModel();
        $categoria = $CategoriaModel->find($id_categoria);


        if ($this->request->getMethod() === 'post') {
            //quando o form for submetido
            $categoria->descricao = $this->request->getPost('descricao');



            if ($CategoriaModel->update($id_categoria, $categoria)) {
                $data['msg'] = ' <div class="alert alert-success" role="alert">Dados editados com <b>sucesso </b><i class="fas fa-check-circle"></i></div>';
            } else {
                $data['msg'] = 'Erro ao editar';
            }
        }

        $data['categoria'] = $categoria;

        echo view('/template/dashboard_header.php', $data);
        echo view('dashboard/categoria_dashboard', $data);
        echo view('/template/dashboard_footer.php');
    }

    ///////////////////////////// DELETE ///////////////////////////////////////
    public function excluir($id_categoria = null) {

        if (is_null($id_categoria)) {
            //redirecionar a aplicação para o index
            //definir uma msg via session
            $this->session->setFlashdata('msg', 'não encontrada');
            return redirect()->to(base_url('categoriaController/listar_categoria'));
        }

        $CategoriaModel = new \App\Models\CategoriaModel();
        if ($CategoriaModel->delete($id_categoria)) {
            //excluir com sucesso
            $this->session->setFlashdata('msg', '<div class="alert alert-success" role="alert">Dados excluídos com <b>sucesso </b><i class="fas fa-check-circle"></i></div>');
        } else {
            //erro ao excluir
            $this->session->setFlashdata('msg', 'Erro ao excluir');
        }
        return redirect()->to(base_url('categoriaController/listar_categoria'));
    }

    public function pesquisarCategoria() {

        //1º passo - Irá chamar uma view que exibe todos os itens
        $CategoriaModel = new \App\Models\CategoriaModel();
        $data['categorias'] = $CategoriaModel->find();

        $data['msg'] = $this->session->getFlashdata('msg');

        //getvar para pesquisa
        $pesquisar = $this->request->getVar('pesquisar');
        if ($pesquisar) {
            $categoria = $CategoriaModel->search($pesquisar);
        } else {
            $categoria = $CategoriaModel;
        }

        //Paginação
        $data = [
            'categorias' => $CategoriaModel->paginate(7, 'paginacao'),
            'pager' => $CategoriaModel->pager
        ];

        $data['titulo'] = 'Pesquisar Categoria';
        echo view('/template/dashboard_header.php', $data);
        echo view('dashboard/pesquisar_categoria', $data);
        echo view('/template/dashboard_footer.php');
    }

}
