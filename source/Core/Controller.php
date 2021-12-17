<?php

namespace Source\Core;

use Source\Support\File;
use Source\Support\Seo;

class Controller
{
    protected $view;
    protected $seo;
    protected $file;

    public function __construct(string $pathToView = null)
    {
        
        $this->view = new View(__DIR__ . "/../../themes/");
        $this->seo = new Seo();
        $this->file = new File();
    }
}