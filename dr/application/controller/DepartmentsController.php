<?php

namespace WiseChain\controller;

use WiseChain\core\Controller;

class DepartmentsController extends Controller
{
    public function departments(): bool|array|string
    {
        return $this->render('Departments');
    }

}