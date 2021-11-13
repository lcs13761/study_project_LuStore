<?php

namespace Source\Core;

abstract class Model
{
    protected $protected;

    protected $table;

    protected $data;

    protected $params;

    protected $fillable;

    protected $order;

    protected $offset;

    protected $fecth;

    protected $column;

    protected $limit;

    protected $last_id;

    /**
     * @param $name
     * @param $value
     */
    public function __set($name, $value)
    {
        if (empty($this->data)) {
            $this->data = new \stdClass();
        }

        $this->data->$name = $value;
    }

    /**
     * @param $name
     * @return bool
     */
    public function __isset($name)
    {
        return isset($this->data->$name);
    }

    /**
     * @param $name
     * @return null
     */
    public function __get($name)
    {
        return ($this->data->$name ?? null);
    }

    public function data(): ?object
    {
        return $this->data;
    }

    public function lastID()
    {
        $this->query = "SELECT  LAST_INSERT_ID()";

        return $this;
    }

    public function auth($email)
    {

        $this->query = "SELECT * FROM {$this->table} WHERE email = '$email'";
        return $this->fetch();
    }

    public function find($id)
    {
        try {
            $stmt = Connect::getInstance()->prepare("SELECT * FROM {$this->table} WHERE id = :id");
            $stmt->bindValue(":id", $id);
            $stmt->execute();
            return $stmt->fetchObject(static::class);
        } catch (\PDOException $exception) {
        }
    }

    public function where(string $column, string $value, $expression = "=")
    {
        $this->query = "SELECT * FROM {$this->table} WHERE {$column} {$expression} '{$value}'";
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

    public function count(?string $params = null)
    {
        $stmt = Connect::getInstance()->prepare($this->query);
        $stmt->execute($this->params);
        return $stmt->rowCount();
    }

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
            throw new \PDOException($exception->getMessage(), (int)$exception->getCode());
        }
    }

    public function create(array $values)
    {
        try {
            $save = [];
            foreach ($values as $key => $value) {
                in_array($key, $this->fillable) ? $save[$key] = $value : "";
            }

            $columns = implode(", ", array_keys($save));
            $values = ":" . implode(", :", array_keys($save));
            $stmt = Connect::getInstance()->prepare("INSERT INTO {$this->table} ({$columns}) VALUES ({$values})");
            $stmt->execute($save);
            $id = Connect::getInstance()->lastInsertId();
            $this->data = $this->find($id)->data();
            return $this;
        } catch (\PDOException $exception) {
            return null;
        }
    }
    
    public function update(?string $terms = null, ?string $params = null, ?string $columns = null)
    {
        try {
            $stmt = Connect::getInstance()->prepare("UPDATE {$this->table} SET {$terms} {$params}");
            $stmt->execute();
        } catch (\PDOException $exception) {
            redirect("/ops/problemas");
        }
    }

    public function delete(?string $params, ?string $terms, ?string $columns = null)
    {
        try {
            $stmt = Connect::getInstance()->prepare("DELETE FROM {$this->table} WHERE {$params} '{$terms}'");
            $stmt->execute();
        } catch (\PDOException $exception) {
            redirect("/ops/problemas");
        }
    }

      /**
     * @param array $data
     * @return array|null
     */
    private function filter(array $data): ?array
    {
        $filter = [];
        foreach ($data as $key => $value) {
            $filter[$key] = (is_null($value) ? null : filter_var($value, FILTER_DEFAULT));
        }
        return $filter;
    }


    /**
     * @return bool
     */
    protected function required(): bool
    {
        $data = (array)$this->data();
        foreach ($this->fillable as $field) {
            if (empty($data[$field])) {
                return false;
            }
        }
        return true;
    }
}
