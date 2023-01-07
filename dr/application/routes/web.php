<?php

use WiseChain\controller\DepartmentsController;
use WiseChain\controller\DoctorsController;
use WiseChain\controller\SettingController;
use WiseChain\controller\ViewController;
use WiseChain\core\Application;
use WiseChain\model\User;
use WiseChain\controller\HomeController;
use WiseChain\controller\LoginController;

$config = [
    'userClass' => User::class
];
$app = new Application(APP_PATH, $config);

$app->router->get('/', [HomeController::class, 'login']);
$app->router->post('/', [HomeController::class, 'login']);

$app->router->get('/about', [HomeController::class, 'about']);
$app->router->get('/language', [HomeController::class, 'language']);

$app->router->get('/logout', [LoginController::class, 'logout']);
$app->router->get('/dashboard', [LoginController::class, 'dashboard']);
$app->router->get('/profile', [LoginController::class, 'profile']);
$app->router->get('/setting', [SettingController::class, 'setting']);
$app->router->get('/privileges', [SettingController::class, 'privileges']);
$app->router->get('/groups', [SettingController::class, 'groups']);

$app->router->get('/departments', [DepartmentsController::class, 'departments']);
$app->router->get('/doctors', [DoctorsController::class, 'doctors']);

$app->router->get('/view/', [ViewController::class, 'view']);

$app->run();