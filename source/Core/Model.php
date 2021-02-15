<?php

namespace Source\Core;


abstract class Model
{

    protected static $protected;

    protected static $entity;

    protected $data;

    protected $params;

    protected $order;

    protected $offset;

    protected $fecth;

    protected $column;

    protected $limit;

    protected $last_id;

    /***
     * responsavel por fazer uma busca na tabela conteudo
     */
    public function __construct(string $entity, ?string $protected = null)
    {
        self::$entity = $entity;
        self::$protected = $protected;
    }

    public function lastID()
    {
        $this->query = "SELECT  LAST_INSERT_ID()";

        return $this;
    }
    public function find(?string $terms = null, ?string $params = null, string $columns = "*")
    {
        if ($terms) {
            $this->query = "SELECT {$columns} FROM " . self::$entity . $terms . " " . $params . "  ";
            return $this;
        }
        $this->query = "SELECT {$columns} FROM " . self::$entity;

        return $this;
    }
    /**
     * define a ordem
     */
    public function order(string $columnsOrder): Model
    {
        try {
            $this->order = " ORDER BY {$columnsOrder}";
            return $this;
        } catch (\PDOException $exception) {
            redirect("/ops/problemas");
        }
    }

    /**define o limit para exibir */
    public function limit(int $limit): Model
    {
        try {

            $this->limit = " LIMIT {$limit}";
        } catch (\PDOException $exception) {
            redirect("/ops/problemas");
        }


        return $this;
    }
    /**definir aparti de qual posicao inicia a contag */
    public function offset(int $offset): Model
    {
        $this->offset = " OFFSET {$offset}";
        return $this;
    }
    /**faz a contagem de todas as posicoes na tabela */
    public function count(?string $params = null): int
    {
        try {
            if (!empty($params)) {
                $this->query = ("SELECT * FROM " . self::$entity . $params);
            } else {
                $this->query = ("SELECT * FROM " . self::$entity);
            }

            $stmt = Connect::getInstance()->prepare($this->query);
            $stmt->execute();
            return $stmt->rowCount();
        } catch (\PDOException $exception) {
            redirect("/ops/problemas");
        }
    }
    /**
     * select *from imagem order by {} LIMIt {};
     * executa os elementos anteriores
     */
    public function fetch(bool $all = false)
    {
        try {
            $stmt = Connect::getInstance()->prepare($this->query . $this->order . $this->limit . $this->offset);
            $stmt->execute();
            if ($all) {
                return $stmt->fetchAll(\PDO::FETCH_CLASS, static::class);
            }
            return $stmt->fetchObject(static::class);
        } catch (\PDOException $exception) {
            redirect("/ops/problemas");
        }
    }


    public function insert(?string $terms, ?string $params, ?string $columns = null)
    {
        try {

            $stmt = Connect::getInstance()->prepare("INSERT INTO " . self::$entity . " ({$terms}) values({$params})");
            $stmt->execute();
        } catch (\PDOException $exception) {
            redirect("/ops/problemas");
        }
    }
    public function update(?string $terms = null, ?string $params = null, ?string $columns = null)
    {
        try {
            $stmt = Connect::getInstance()->prepare("UPDATE " . self::$entity . " SET {$terms} {$params}");
            $stmt->execute();
        } catch (\PDOException $exception) {
            redirect("/ops/problemas");
        }
    }

    public function delete(?string $params, ?string $terms, ?string $columns = null)
    {
        try {
            $stmt = Connect::getInstance()->prepare("DELETE FROM " . self::$entity . " WHERE {$params} '{$terms}'");
            $stmt->execute();
        } catch (\PDOException $exception) {
            redirect("/ops/problemas");
        }
    }
}
