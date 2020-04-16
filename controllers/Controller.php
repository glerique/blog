<?php

namespace Controllers;

abstract class Controller
{

    protected $modelName;
    protected $modelManager;

    public function __construct()
    {
        $realModelName = "\\models\\managers\\" . $this->modelName . 'Manager';
        $this->modelManager = new $realModelName();
    }


    protected function redirectWithError(string $url, string $message)
    {
        \models\Session::addFlash('error', $message);
        \models\Http::redirect($url);
    }

    protected function redirectWithSuccess(string $url, string $message)
    {
        \models\Session::addFlash('success', $message);
        \models\Http::redirect($url);
    }
}
