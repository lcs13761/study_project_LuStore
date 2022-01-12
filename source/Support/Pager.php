<?php

namespace Source\Support;

use CoffeeCode\Paginator\Paginator;

class Pager
{
    public $paginator;
    public Paginator $pager;

    public function __construct(int $rows, int $limit,int $page = 1)
    {
        $this->pager = new Paginator();
        $this->pager->pager($rows, $limit, $page);
        $this->paginator = $this->pager->render();
    }
}