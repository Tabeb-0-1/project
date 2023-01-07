<?php

namespace WiseChain\controller;

use WiseChain\core\Controller;

class DoctorsController extends Controller
{
    public function doctors(): bool|array|string
    {
        return $this->render('Doctors');
    }
}