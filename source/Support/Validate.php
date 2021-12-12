<?php

namespace Source\Support;

class Validate
{
    private static bool $valid = true;

    public static function make(array $request, array $validate): bool
    {

        foreach ($validate as $key => $type) {
            if (!isset($request[$key])) {
                self::notFound($key);
                break;
            }

            self::verify($request[$key], $key,$type);
        }
        return self::$valid;
    }

    /**
     * @param string $titleValue
     * @param mixed $valueValidated
     * @param array|string $validationType
     */
    public static function verify(string $valueValidated, mixed $titleValue, array|string $validationType): void
    {
        if (is_array($validationType)) {
            foreach ($validationType as $value) {
                if ($value == "required") self::required($valueValidated, $titleValue);
                if ($value == "email") self::email($valueValidated, $titleValue);
                if ($value == "numeric") self::numeric($valueValidated, $titleValue);
                if ($value == "string") self::string($valueValidated, $titleValue);
                if (str_contains($value, "unique:")) self::unique($value, $valueValidated, $titleValue);
            }
        }
    }

    private static function notFound(string|int $key): void
    {
        self::$valid = false;
        $message[$key] = "$key não foi passado.";
        session()->set("validate", $message);
    }

    private static function required(string $value, string $key):void
    {
        if (empty($value)) {
            self::$valid = false;
            $message[$key] = $key . "is required";
            session()->set("validate", $message);
        }
    }

    private static function email(string $value, string $key): void
    {

        if (false === filter_var($value, FILTER_VALIDATE_EMAIL)) {
            self::$valid = false;
            $message[$key] = "Invalid E-mail";
            session()->set("validate", $message);
        }
    }

    private static function numeric(string|int|array $value, string $key): void
    {

        if (!is_numeric($value)) {
            self::$valid = false;
            $message[$key] = "Invalid Number";
            session()->set("validate", $message);
        }
    }

    private static function string(string $value, string $key): void
    {
        if (!is_string($value)) {
            self::$valid = false;
            $message[$key] = "Invalid type string";
            session()->set("validate", $message);
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
                $message[$keyVerification] = $keyVerification . " indiponivel";
                session()->set("validate", $message);
            }
        }

    }
}
