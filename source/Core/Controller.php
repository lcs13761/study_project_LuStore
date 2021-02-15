<?php

namespace Source\Core;



class Controller
{
    protected $view;
    protected $seo;

    public function __construct(string $pathToView = null)
    {
        $this->view = new View($pathToView);
        $this->seo = new Seo();
    }
}