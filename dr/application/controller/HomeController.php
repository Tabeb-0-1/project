<?php

namespace WiseChain\controller;

use JetBrains\PhpStorm\NoReturn;
use WiseChain\core\Application;
use WiseChain\core\Controller;
use WiseChain\core\Request;
use WiseChain\core\Response;
use WiseChain\model\User;

class HomeController extends Controller
{
    public function login(Request $request, Response $response): bool|array|string
    {
        $login = new User();
        if ($request->isPost()){
            $login->loadData($request->getBody());
            if ($login->validate() && $login->login()){
                $response->redirect('/dashboard');
            }
        }
        return $this->render('home',[
            'model' => $login
        ]);
    }
    public function about(): string|array|bool
    {
        return $this->render('about');
    }
    #[NoReturn] public function language()
    {
        if (isset($_SERVER['HTTP_REFERER']) && !empty($_COOKIE['lang'])) {
            $_COOKIE['lang'] = $_COOKIE['lang'] == 'en' ? 'ar' : 'en';
            setcookie('lang', $_COOKIE['lang'], time() + (86400 * 7),  "/", "", "", TRUE);
            Application::$app->response->redirect($_SERVER['HTTP_REFERER']);
        } else {
            Application::$app->response->redirect();
        }
    }
}