<?php

namespace App\Supports\Resources;

/**
 * @method static array collection($collection)
 */
abstract class JsonResource
{
    protected $data;

    public function __construct($data = [])
    {
        $this->data = is_array($data) ? $data : $data->getData();

        $this->data = $this->toArray();
    }

    public static function __callStatic(mixed $method, mixed $arguments): mixed
    {
        $called = get_called_class();
        $class = new $called();
        return $class->$method(...$arguments);
    }

    public function __get($key)
    {
        return $this->data[$key] ?? null;
    }

    /**
     * Summary of collection
     * @param mixed $collection
     * @return array
     */
    protected function collection($collection)
    {
        if (!is_array($collection)) {
            return [];
        }

        return array_map(function ($value) {
            $this->data = $value->getData();
            return $this->toArray();
        }, $collection);

    }

    abstract public function toArray();
}