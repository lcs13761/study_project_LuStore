<?php

namespace Source\Supports;

use Source\Models\Auth;
use Source\Models\User;

class Validate
{
    private static bool $valid = true;
    private static array $errors = array();

    public static function make(array $request, array $validate): bool
    {
        foreach ($validate as $key => $value) {
            if (!isset($request[$key])) {
                self::notFound($key);
                break;
            }

            if (is_array($value)) {

                    foreach ($value as $valueValidated) {
                        if($valueValidated == "nullable" && empty($request[$key])) break;
                        if ($valueValidated == "required") self::required($request[$key], $key);
                        if ($valueValidated == "confirmed") self::confirmed($request, $key);
                        if ($valueValidated == "email") self::email($request[$key], $key);
                        if ($valueValidated == "numeric") self::numeric($request[$key], $key);
                        if ($valueValidated == "float") self::float($request[$key], $key);
                        if ($valueValidated == "string") self::string($request[$key], $key);
                        if (str_contains($valueValidated, "current:user")) self::currentPassword($request);
                        if (str_contains($valueValidated, "unique:")) self::unique($valueValidated, $request[$key], $key);
                    }

            }
        }
        session()->set("errors", self::$errors);
        return self::$valid;
    }

    private static function currentPassword($request){
        if(!isset($request['current_password'])){
            self::$valid = false;
            self::$errors['current_password'][] = "current_password" . "is required";
            return;
        }

        if (!password_verify(Auth::auth()->password, $request['current_password'])) {
            self::$valid = false;
            self::$errors['current_password'][] = "A senha informada não confere";

        }
    }

    private static function confirmed(array $value, string $key){

        if(!isset($value[$key . "_confirmation"])){
            self::$valid = false;
            self::$errors[$key][] = $key . "_confirmation" . "is required";
            return;
        }

        if($value[$key] != $value[$key . "_confirmation"]){
            self::$valid = false;
            self::$errors[$key][] = $key . " and " .  $key . "_confirmation is diferent";
        }
    }

    private static function notFound(string|int $key): void
    {
        self::$valid = false;
        self::$errors[$key][] = "$key não foi passado.";

    }

    private static function required(string $value, string $key): void
    {

        if (empty($value)) {
            self::$valid = false;
            self::$errors[$key][] = $key . "is required";
        }
    }

    private static function email(string $value, string $key): void
    {
        if (false === filter_var($value, FILTER_VALIDATE_EMAIL)) {
            self::$valid = false;
            self::$errors[$key][] = "Invalid E-mail";
        }
    }

    private static function numeric($value, string $key): void
    {
        if (!is_numeric($value)) {
            self::$valid = false;
            self::$errors[$key][] = "Invalid Number";
        }
    }

    private static function float($value, string $key): void
    {
        if (!is_float($value)) {
            self::$valid = false;
            self::$errors[$key][] = "Invalid Number";
        }
    }

    private static function string($value, string $key): void
    {
        if (!is_string($value)) {
            self::$valid = false;
            self::$errors[$key][] = "Invalid type string";
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
                $exists = $model::where($column, $value)->andWhere($columnVerification, $valueVerification, '!=');
            } else {
                $exists = $model::where($column, $value);
            }
            if ($exists->count() > 0) {

                self::$valid = false;
                self::$errors[$keyVerification][] = $keyVerification . " indiponivel";
            }
        }
    }
}
