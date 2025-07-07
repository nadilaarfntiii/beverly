<?php 

namespace App\Filters;

use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\Filters\FilterInterface;

class Auth_login implements FilterInterface{
    public function before(RequestInterface $request, $arguments = null){
        $session_lg = session();
        if (! $session_lg->get('logged_in')){
            return redirect()->to('/'); //dikembalikan ke form login
        }
    }
    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null){

    }
}