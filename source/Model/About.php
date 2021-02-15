<?php

namespace Source\Model;

use Source\Core\Model;

class About extends Model
{

    protected static $entity;

    public function __construct()
    {
        parent::__construct("pergunt", null);
    }

    public function findPergunt(string $columns = "*" ,?string $terms = null, ?string $params = null)
    {

        $terms = $terms;
        if (!empty($params)) {
            $params = " WHERE {$params}";
        }
       
        return parent::find($terms, $params, $columns);
    }
    public function insert(?string $terms, ?string $params, ?string $columns = null)
    {
        $terms = $terms;
        $params = $params;

        return parent::insert($terms, $params, $columns);
    }
  
    

}
