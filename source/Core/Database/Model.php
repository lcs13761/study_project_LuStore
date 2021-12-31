<?php

namespace Source\Core\Database;


use PDOException;

abstract class Model
{
    protected array $protected = [];

    protected string $table = 'users';

    protected $data;

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

    public static function __callStatic($method,$args){
        $called = get_called_class();
        $class = new $called();
        return $class->$method(...$args);
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

   public function data(): ?object
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

    protected function all(){
        $this->query = "SELECT * FROM " . $this->table;
        return $this->fetch(true);
    }

    protected function find(int|string $id): mixed
    {
        $this->query = "SELECT * FROM {$this->table} WHERE id = :id";
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

    final protected function create(array|object $values): Model
    {
        try {

            $save = [];
            foreach ($values as $key => $value) {
                in_array($key, $this->fillable) && !empty($value) ? $save[$key] = $value : "";
            }

            $columns = implode(", ", array_keys($save));
            $values = ":" . implode(", :", array_keys($save));
            $stmt = Connect::getInstance()->prepare("INSERT INTO {$this->table} ({$columns}) VALUES ({$values})");
            $stmt->execute($save);
            $id = Connect::getInstance()->lastInsertId();
            $this->data = $this->find($id);
            return $this;
        } catch (\PDOException $exception) {
            throw  new \PDOException($exception->getMessage());

        }
    }

    /**
     * @param array|null $data
     * @return int|PDOException
     */
    final public function update(?array $data = null): int|\PDOException
    {
        try {
            $save = [];
            foreach ($data as $key => $value) {
                in_array($key, $this->fillable) && !empty($value) ? $save[$key] = $value : "";
            }

            $dataSet =  $this->filter($data);
            $dataSet = implode(", ", $dataSet);
            $data = $save;
            $stmt = Connect::getInstance()->prepare("UPDATE {$this->table} SET {$dataSet} WHERE id = :id");
            var_dump($stmt);
            $stmt->bindValue(":id" , $this->id);
            parse_str("id={$this->id}",$this->params);
            $stmt->execute(array_merge($data,$this->params));
            return ($stmt->rowCount() ?? 1);
        } catch (\PDOException $exception) {
            return throw new \PDOException($exception->getMessage());
        }
    }

    /**
     * @param string|null $terms
     * @param string|null $params
     * @return bool
     */
    final public function delete(?string $terms, ?string $params):bool
    {
        try {
            $stmt = Connect::getInstance()->prepare("DELETE FROM {$this->table} WHERE {$terms}");
            if ($params) {
                parse_str($params, $params);
                $stmt->execute($params);
                return true;
            }
            $stmt->execute();
            return true;
        } catch (\PDOException $exception) {
            return false;
        }
    }

    public function destroy():bool {
        if(empty($this->id)){
                return false;
        }
        return $this->delete("id = :id","id={$this->id}");
    }


    /**
     * @param array $data
     * @return array
     */
    public function filter(array $data): array
    {
        $dataSet = [];
        foreach ($data as $key => $value) {
            if (!in_array($key, $this->protected) && in_array($key,$this->fillable) && !empty($value)) {
                $dataSet[] = "{$key} = :{$key}";
            }
        }
        return $dataSet;
    }


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
    private function required(): bool
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
