<?php

namespace WiseChain\controller;

use WiseChain\core\Controller;

class ViewController extends Controller
{
    public function view(): bool|array|string
    {

        return $this->render("view");
    }
}