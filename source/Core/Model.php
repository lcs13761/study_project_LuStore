<?php

namespace Source\Core;

use JetBrains\PhpStorm\Pure;

abstract class Model
{
    protected array $protected = [];

    protected string $table = '';

    protected object $data;

    protected array $fillable = [];

    protected string $order = '';

    protected $params;

    protected $offset;

    protected $limit;

    protected $last_id;

    private string $query = '';


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
   final public function __isset($name): bool
    {
        return isset($this->data->$name);
    }

    /**
     * @param $name
     * @return null
     */
   final public function __get($name): mixed
    {
        return ($this->data->$name ?? null);
    }

   final public function data(): ?object
    {
        return $this->data;
    }

    public function lastID()
    {
        $this->query = "SELECT  LAST_INSERT_ID()";

        return $this;
    }

    public function auth(string $email)
    {
        $this->query = "SELECT * FROM {$this->table} WHERE email = :email";
        parse_str("email={$email}", $this->params);
        return $this->fetch();
    }

    public function find(int|string $id): mixed
    {
        $this->query = "SELECT * FROM {$this->table} WHERE id = :id or auth_id = :id";
        parse_str("id={$id}", $this->params);
        return  $this->fetch();
    }

    final public function where(string $column, string $value,string $expression = "="): Model
    {
        $this->query = "SELECT * FROM {$this->table} WHERE {$column} {$expression} '{$value}'";
        return $this;
    }

   final public function andWhere(string $column,string  $value,string $expression = '='): Model{
        $this->query =  $this->query . " AND {$column} {$expression} '{$value}'";
        return $this;
    }

    final public function orWhere(string $column,string  $value,string $expression = '='): Model{
        $this->query =  $this->query . " OR {$column} {$expression} '{$value}'";
        return $this;
    }
    /**
     * define a ordem
     */
    final public function order(string $columnsOrder): Model|null
    {
        try {
            $this->order = " ORDER BY {$columnsOrder}";
            return $this;
        } catch (\PDOException $exception) {
                return null;
        }
    }

    /**define o limit para exibir */
    final public function limit(int $limit): Model
    {
        try {

            $this->limit = " LIMIT {$limit}";
        } catch (\PDOException $exception) {
            redirect("/ops/problemas");
        }


        return $this;
    }

    /**definir aparti de qual posicao inicia a contag */
    final public function offset(int $offset): Model
    {
        $this->offset = " OFFSET {$offset}";
        return $this;
    }

   final public function count(?string $params = null): int
    {
        $stmt = Connect::getInstance()->prepare($this->query);
        $stmt->execute($this->params);
        return $stmt->rowCount();
    }

    final public function fetch(bool $all = false): mixed
    {
        try {
            $stmt = Connect::getInstance()->prepare($this->query . $this->order . $this->limit . $this->offset);
            $stmt->execute($this->params);

            if (!$stmt->rowCount()) {
                return null;
            }

            if ($all) {
                return $stmt->fetchAll(\PDO::FETCH_CLASS, static::class);
            }
            return $stmt->fetchObject(static::class);
        } catch (\PDOException $exception) {
            return null;
        }
    }

    final public function create(array $values): ?Model
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

    final public function update(?array $data = null): ?int
    {
        try {
            $dataSet =  $this->search($data);
            $dataSet = implode(", ", $dataSet);
            $stmt = Connect::getInstance()->prepare("UPDATE {$this->table} SET {$dataSet} WHERE id = :id");
            $stmt->bindValue(":id" , $this->id);
            parse_str("id={$this->id}",$this->params);
            $stmt->execute(array_merge($data,$this->params));
            return ($stmt->rowCount() ?? 1);
        } catch (\PDOException $exception) {
            return null;
        }
    }

    /**
     * @param string|null $params
     * @param string|null $terms
     * @param string|null $columns
     * @return void|null
     */
    final public function delete(?string $params, ?string $terms, ?string $columns = null)
    {
        try {
            $stmt = Connect::getInstance()->prepare("DELETE FROM {$this->table} WHERE {$params} '{$terms}'");
            $stmt->execute();
        } catch (\PDOException $exception) {
            return null;
        }
    }

    /**
     * @param array $data
     * @return array
     */
    public function search(array $data): array
    {
        $dataSet = [];
        foreach ($data as $key => $value) {
            if (!in_array($key, $this->protected) && in_array($key,$this->fillable)) {
                $dataSet[] = "{$key} = :{$key}";
            }
        }
        return $dataSet;
    }

    // /**
    //  * @param array $data
    //  * @return array|null
    //  */
    // private function filter(array $data): ?array
    // {
    //     $filter = [];
    //     foreach ($data as $key => $value) {
    //         $filter[$key] = (is_null($value) ? null : filter_var($value, FILTER_DEFAULT));
    //     }
    //     return $filter;
    // }

    final public function safe(): array {
        $safe = (array)$this->data;
        foreach ($this->protected as $unset){
            unset($safe[$unset]);
        }
        return $safe;
    }

    /**
     * @return bool
     */
    #[Pure]private function required(): bool
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
