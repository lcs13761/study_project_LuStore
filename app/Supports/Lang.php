<?php

namespace App\Supports;

class Lang
{
    private $language;

    public function __construct()
    {
        $this->language =  str_replace('-', '_', config('app.locale'));
    }

    public function getLang(string $string, array $options = [])
    {
        $string = strtr($string, ['/' => '.']);
        
        $values = explode('.', $string);

        $file = $this->getFile($values[0]);

        $result = $this->getString($values, $file);

        return is_string($result) ? $this->replaceValue($result, $options) : $string;
    }

    /**
     * retorna o arquivo
     *
     * @param string $fileName
     * @return mixed
     */
    private function getFile(string $fileName)
    {
        $fileName = $fileName . '.php';

        return include base_app('lang/' . $this->language . '/' . $fileName);
    }

    /**
     * Buscar o valor no arquivo de lang
     *
     * @param array $values
     * @param [type] $arrays
     * @return mixed
     */
    private function getString(array $values, $arrays)
    {
        unset($values[0]);

        foreach ($values as $value) {

            $result = $arrays[$value] ?? null;

            if (is_null($result)) {
                $arrays = null;
                return;
            }
            $arrays = $result;
        }

        return $arrays;
    }

    /**
     * alterar um atributo da lang
     *
     * @param string $string
     * @param array $options
     * @return string
     */
    private function replaceValue(string $string, array $options): string
    {
        if (empty($options)) {
            return $string;
        }

        $string = array_reduce(
            array_keys($options),
            fn ($carry, $key) => str_replace(":$key", $options[$key], $carry),
            $string
        );

        return $string;
    }
}
