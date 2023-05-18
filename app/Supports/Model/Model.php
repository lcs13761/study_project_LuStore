<?php


namespace App\Supports\Model;

use Bootstrap\Database\Connect;

abstract class Model
{
    use HandleModel;

    protected array $protected = [];

    protected array $select = ['*'];

    protected string $table = '';

    protected $data;

    protected array $fillable = [];

    protected string $order = '';

    protected $params;

    protected $offset;

    protected $limit;

    protected $last_id;

    private string $query = '';

    /**
     * 
     *
     * @return array
     */
    public function toArray(): array
    {
        return (array) $this->data;
    }

    /**
     * Undocumented function
     *
     * @return 
     */
    public function lastID()
    {
        $this->query = "SELECT  LAST_INSERT_ID()";

        return $this;
    }

    /**
     * 
     *
     * @param [type] ...$args
     * @return
     */
    public function select(...$args)
    {
        $this->select = [$args];

        return $this;
    }

    /**
     * 
     *
     * @return 
     */
    public function all()
    {
        $this->query = "SELECT {$this->getSelect()} FROM " . $this->table;

        return $this->fetch(true);
    }

    /**
     * Busca a informação através do id
     *
     * @param integer $id
     * @return mixed
     */
    final public function find(int $id): mixed
    {
        $this->query = "SELECT {$this->getSelect()} FROM {$this->table} WHERE id = :id";

        parse_str("id={$id}", $this->params);

        return $this->fetch();
    }

    /**
     * Undocumented function
     *
     * @param string $column
     * @param string $value
     * @param string $expression
     * @return Model
     */
    public function where(string $column, string $value, string $expression = "="): Model
    {
        $this->query = " WHERE {$column} {$expression} '{$value}'";

        return $this;
    }

    /**
     * 
     *
     * @param string $column
     * @param string $value
     * @param string $expression
     * @return Model
     */
    final public function andWhere(string $column, string $value, string $expression = '='): Model
    {
        $this->query = $this->query . " AND {$column} {$expression} '{$value}'";

        return $this;
    }

    /**
     * 
     *
     * @param string $column
     * @param string $value
     * @param string $expression
     * @return Model
     */
    final public function orWhere(string $column, string $value, string $expression = '='): Model
    {
        $this->query = $this->query . " OR {$column} {$expression} '{$value}'";

        return $this;
    }

    /**
     * 
     *
     * @param string $columnsOrder
     * @return Model
     */
    final public function order(string $columnsOrder): Model
    {
        $this->order = " ORDER BY {$columnsOrder}";

        return $this;
    }

    /**
     * define o limit para exibir
     *
     * @param integer $limit
     * @return Model
     */
    final public function limit(int $limit): Model
    {
        $this->limit = " LIMIT {$limit}";

        return $this;
    }

    /**
     * definir aparti de qual posicao inicia a contag 
     *
     * @param integer $offset
     * @return Model
     */
    final public function offset(int $offset): Model
    {
        $this->offset = " OFFSET {$offset}";

        return $this;
    }

    /**
     * 
     *
     * @param string|null $params
     * @return integer
     */
    final public function count(): int
    {
        $stmt = Connect::getInstance()->prepare($this->query);

        $stmt->execute($this->params);

        return $stmt->rowCount();
    }

    /**
     * Undocumented function
     *
     * @return 
     */
    final public function get()
    {
        $query = $this->query;

        $this->query = "SELECT {$this->getSelect()} FROM {$this->table} {$query}";

        return $this->fetch(true);
    }

    /**
     * Undocumented function
     *
     * @param boolean $all
     * @return mixed
     */
    private function fetch(bool $all = false): mixed
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
            throw new \PDOException($exception->getMessage(), $exception->getCode());
        }
    }

    /**
     * Undocumented function
     *
     * @param array|object $values
     * @return Model
     */
    final public function create(array|object $values): Model
    {
        $db = Connect::getInstance();

        try {
            $save = $this->filterValues($values, 'created');

            $columns = implode(", ", array_keys($save));

            $values = ":" . implode(", :", array_keys($save));

            $stmt = $db->prepare("INSERT INTO {$this->table} ({$columns}) VALUES ({$values})");

            $stmt->execute($save);

            $id = $db->lastInsertId();

            $this->data = $this->find($id);

            return $this;
        } catch (\PDOException $exception) {

            var_dump($exception->getMessage());
            throw new \PDOException($exception->getMessage(), $exception->getCode());
        }
    }

    /**
     * @param array|null $data
     * @return int|\PDOException
     */
    final public function update(?array $data = null): int|\PDOException
    {
        try {
            $dataSet = $this->filter($data);

            $dataSet = implode(", ", $dataSet);

            $stmt = Connect::getInstance()->prepare("UPDATE {$this->table} SET {$dataSet} WHERE id = :id");

            $stmt->bindValue(":id", $this->id);

            $data = $this->filterValues($data);

            parse_str("id={$this->id}", $params);

            $stmt->execute(array_merge($data, $params));

            return ($stmt->rowCount() ?? 1);
        } catch (\PDOException $exception) {
            print_r($exception->getMessage());
            throw new \PDOException($exception->getMessage(), $exception->getCode());
        }
    }

    /**
     * @param string|null $terms
     * @param string|null $params
     * @return bool
     */
    final public function destroy(): bool
    {
        try {
            if (!empty($this->id)) {
                $stmt = Connect::getInstance()->prepare("DELETE FROM {$this->table} WHERE id = :id");

                $stmt->bindValue(":id", $this->id);

                $stmt->execute();

                return true;
            }

            return false;
        } catch (\PDOException $exception) {
            throw new \PDOException($exception->getMessage(), $exception->getCode());
        }
    }
}