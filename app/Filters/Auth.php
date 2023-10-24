<?php

namespace App\Filters;

use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\Filters\FilterInterface;

class Auth implements FilterInterface {

    public function before(RequestInterface $request, $arguments = null) {

        if ((bool) session()->isLoggedIn != true) {
            return redirect()->to('/Sistema_TCC/public/index.php/login');
        }

//        if ((string) session()->tipo === 'padrao') {
//            return redirect()->to('/Sistema_TCC/public/index.php/login');
//        }


// Do something here
    }

    //--------------------------------------------------------------------

    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null) {





// Do something here
    }

}

//ARQUIVO CRIADO 31/01 PARA AUTENTICAR LOGIN