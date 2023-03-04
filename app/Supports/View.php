<?php

declare(strict_types=1);

namespace App\Supports;

use App\Helpers\MenuLoader;
use League\Plates\Engine;
use Pecee\SimpleRouter\SimpleRouter as Router;

class View
{
    private $engine;


    public function __construct(string $path = CONF_VIEW_PATH, string $ext = 'php')
    {
        $this->engine = new Engine($path, $ext);
    }
    /**
     *   /**
     * function path with $name, $path
     * @return View
     */
    public function Path(string $name, string $path): View
    {
        $this->engine->addfolder($name, $path);
        return $this;
    }
    /**
     * function render for Web
     * params string $templateName , aray $data
     * @return string
     */
    public function render(string $templateName, array $data): string
    {
        if (str_contains($templateName, '.')) {
            $templateName = str_replace('.', '/', $templateName);
        }

        if (request()->getLoadedRoute()->getName()) {
            !str_contains(request()->getLoadedRoute()->getName(), 'admin') ?: $this->engine()->registerFunction('getLoadMenu', [$this, 'getLoadMenu']);
        }

        return $this->engine->render($templateName, $data);
    }

    public function getLoadMenu()
    {
        return MenuLoader::make();
    }

    /**
     * return engine
     */
    public function engine(): engine
    {
        return $this->engine;
    }
}
