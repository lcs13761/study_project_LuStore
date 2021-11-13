<?php

namespace Source\Model;

use Source\Core\Model;

class Product extends Model
{

    protected static $entity = "imagem";

    public function __construct()
    {
        parent::__construct("content", "id");
    }

    public function findProduct(string $columns = "*", ?string $terms = null, ?string $params = null)
    {
        $terms = " JOIN " . self::$entity . " ON imagem.id = content.idimagem";
        if (!empty($params)) {
            $params = " WHERE {$params}";
        }

        return parent::find($terms, $params, $columns);
    }

    public function findPrdt(string $columns = "*", ?string $terms = null, ?string $params = null)
    {
        $terms = " WHERE {$terms}";
        $params = $params;

        return parent::find($terms, $params, $columns);
    }

    public function insertProduct(array $data)
    {
        $data = filter_var_array($data, FILTER_SANITIZE_STRIPPED);
        $terms = [];
        $params = [];
        foreach ($data as $dt => $value) {
            $terms[] = $dt;
            $params[] = $value;
        }
        $last_id = $this->lastID()->fetch(true);

        array_push($terms, "idimagem");

        $last_id = (array)$last_id[0];

        $last_id = implode("", $last_id);

        array_push($params, $last_id);

        $column = implode(",", $terms);

        $value = "'" . implode("','", $params) . "'";

        parent::insert($column, $value);
    }

    public function updateProduct(array $data)
    {
        $id = $data['id'];
        $data = array_diff($data, [$id]);
        $prm = [];
        foreach ($data as $dat => $value) {
            array_push($prm, "{$dat} = '{$value}'");
        }
        $terms = implode(",", $prm);
        $params = "WHERE id = {$id}";
        parent::update($terms, $params);
    }
}
