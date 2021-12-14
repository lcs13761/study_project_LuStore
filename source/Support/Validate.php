<?php

namespace Source\Support;

class Validate
{
    private static bool $valid = true;

    public static function make(array $request, array $validate): bool
    {
        foreach ($validate as $key => $value) {
            if (!isset($request[$key])) {
                self::notFound($key);
                break;
            }

            if (is_array($value)) {
                foreach ($value as $valueValidated) {
                    if ($valueValidated == "required") self::required($request[$key], $key);
                    if ($valueValidated == "email") self::email($request[$key], $key);
                    if ($valueValidated == "numeric") self::numeric($request[$key], $key);
                    if ($valueValidated == "string") self::string($request[$key], $key);
                    if (str_contains($valueValidated, "unique:")) self::unique($valueValidated, $request[$key], $key);
                }
            }
        }
        return self::$valid;
    }

    private static function notFound(string|int $key): void
    {
        self::$valid = false;
        $message[$key][] = "$key não foi passado.";
        session()->set("errors", $message);
    }

    private static function required(string $value, string $key): void
    {

        if (empty($value)) {
            self::$valid = false;
            $message[$key][] = $key . "is required";
            session()->set("errors", $message);
        }
    }

    private static function email(string $value, string $key): void
    {
        if (false === filter_var($value, FILTER_VALIDATE_EMAIL)) {
            self::$valid = false;
            $message[$key][] = "Invalid E-mail";
            session()->set("errors", $message);
        }
    }

    private static function numeric($value, string $key): void
    {
        if (!is_numeric($value)) {
            self::$valid = false;
            $message[$key][] = "Invalid Number";
            session()->set("errors", $message);
        }
    }

    private static function string($value, string $key): void
    {
        if (!is_string($value)) {
            self::$valid = false;
            $message[$key][] = "Invalid type string";
            session()->set("errors", $message);
        }
    }

    /**
     * @param string $uniqueStringValid
     * @param string $value
     * @param string $keyVerification
     */
    private static function unique(string $uniqueStringValid, string $value, string $keyVerification): void
    {
        $array = explode(":", $uniqueStringValid);
        $valuesCheck = explode(",", $array[1]);
        $column = $valuesCheck[0];
        $model = 'Source\Models\\' . ucfirst($valuesCheck[1]);
        if (class_exists($model)) {
            $model = new $model();
            if (count($valuesCheck) > 2) {
                $valueVerification = $valuesCheck[2];
                $columnVerification = $valuesCheck[3];
                $exists = $model->where($column, $value)->orWhere($columnVerification, $valueVerification, '!=');
            } else {
                $exists = $model->where($column, $value);
            }
            if ($exists->count() > 0) {

                self::$valid = false;
                $message[$keyVerification][] = $keyVerification . " indiponivel";
                session()->set("errors", $message);
            }
        }
    }
}
