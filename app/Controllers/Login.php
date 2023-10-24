<?php

namespace App\Controllers;

class Login extends BaseController {

    public function index() {


        $data['msg'] = '';
        $data['titulo'] = 'Fazer login';



        echo view('principal/login', $data);
    }

    public function signIn() {

        $email = $this->request->getPost('email');
        $senha = $this->request->getPost('senha');

        $CadastroUsuarioModel = new \App\Models\CadastroUsuarioModel();
//        $email = $this->request->getVar('email');
        $dadosUsuario = $CadastroUsuarioModel->getByEmail($email);

        if ($dadosUsuario != null) {

            $hashUsuario = $dadosUsuario->senha;

            if (password_verify($senha, $hashUsuario)) {
                session()->set('isLoggedIn', true);
                session()->set('nome', $dadosUsuario->nome);
                session()->set('id_usuario', $dadosUsuario->id_usuario);
                session()->set('nome_profissional', $dadosUsuario->nome_profissional);
                session()->set('tipo', $dadosUsuario->tipo, 'padrao');

                return redirect()->to(base_url('home'));
//                d($hashUsuario);
//                d($senha);
//                d($dadosUsuario);
            } else {
                session()->setFlashData('msg', 'Usuário ou Senha Incorreta');
                return redirect()->to('index');

//                d($hashUsuario);
//                d($senha);
//                d($dadosUsuario);
            }
        } else {
            session()->setFlashdata('msg', 'Usuário ou Senha Incorreta');
            return redirect()->to('index');
        }
    }

    public function signOut() {
        session()->destroy();
        return redirect()->to(base_url('home'));
    }

//--------------------------------------------------------------------
}

//EXEMPLO
//if($result['password'] == $this->request->getVar('password')){
//    echo "nome :".$result['name'];
//}
//
//$result = $model->where('email', $this->request_getVar('email'))->first();