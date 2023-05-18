<?php


namespace App\Supports\Model;


trait HandleModel
{

    public static function __callStatic($method, $args)
    {
        $called = get_called_class();
        $class = new $called();
        return $class->$method(...$args);
    }

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

    private function getSelect(): string
    {
        return implode(',', $this->select);
    }

    /**
     * @param array $data
     * @return array
     */
    public function filter(array $data): array
    {
        $dataSet = [];

        foreach ($data as $key => $value) {
            if (empty($this->fillable)) {
                !in_array($key, $this->protected) ? $dataSet[] = "{$key} = :{$key}" : '';
            } else {
                !in_array($key, $this->protected) && in_array($key, $this->fillable) ? $dataSet[] = "{$key} = :{$key}" : '';
            }
        }
        
        $dataSet[] = "updated_at = :updated_at";

        return $dataSet;
    }


    /**
     * @param array $data
     * @return array
     */
    public function filterValues(array $data, $action = 'updated'): array
    {
        $dataSet = [];

        foreach (array_filter($data) as $key => $value) {

            if (empty($this->fillable)) {
                !in_array($key, $this->protected) ? $dataSet[$key] = trim($value) : '';
            } else {
                !in_array($key, $this->protected) && in_array($key, $this->fillable) ? $dataSet[$key] = trim($value) : '';
            }
        }

        if ($action === 'created') {
            $dataSet['created_at'] = date('Y-m-d H:i:s');
        }

        $dataSet['updated_at'] = date('Y-m-d H:i:s');

        return $dataSet;
    }

    public function getData(): array
    {
        return (array) $this->data;
    }

    /**
     * Undocumented function
     *
     * @return array
     */
    final public function safe(): array
    {
        $safe = (array) $this->data;
        foreach ($this->protected as $unset) {
            unset($safe[$unset]);
        }
        return $safe;
    }

    /**
     * @return bool
     */
    private function required(): bool
    {
        $data = (array) $this->data();
        foreach ($this->fillable as $field) {
            if (empty($data[$field])) {
                return false;
            }
        }
        return true;
    }
}