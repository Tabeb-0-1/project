<?php

namespace WiseChain\controller;

use JetBrains\PhpStorm\NoReturn;
use WiseChain\core\Controller;
use WiseChain\core\Request;
use WiseChain\core\Response;
use WiseChain\model\Cases;
use WiseChain\core\Application;

class LoginController extends Controller
{

    #[NoReturn] public function logout(Request $request, Response $response)
    {
        Application::$app->user = null;
        Application::$app->session->remove('user');
        $response->redirect('/');
    }
    public function dashboard(): bool|array|string
    {
        return $this->render('dashboard',
            ['Cases' => (new Cases)->getAll()]
        );
    }
    public function profile(): bool|array|string
    {
        return $this->render('profile');
    }
}