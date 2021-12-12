<?php

namespace Validate;

use TestValidate;
use PHPUnit\Framework\TestCase;

class TestValidateForm extends TestCase
{
    private array $validator = array();

    public function testRequest()
    {
        $request = ['email' => 'lcs13761@gmail.com'];
        $validatorTest = ['email' => ['email','required','unique:email,user,1,id']];
        $this->assertEquals([],  $this->make($request, $validatorTest));
    }


    public function make(array $data, array $validate)
    {
        $arrayKeysValidation = array_keys($validate);
        foreach ($arrayKeysValidation as $value) {
            if (!isset($data[$value])) {
                $this->assertEquals('', self::notFound($value));
                break;
            };
            $this->assertEquals(true, $this->verify($value, $data[$value], $validate[$value]));
        }
    return $this->validator;
    }

    public function verify(string $titleValue, $valueValidated, array|string $validationType)
    {

        if (is_array($validationType)) {

            foreach ($validationType as $value) {
                if($value == "required") $this->required($valueValidated,$titleValue);
                if ($value == "email")  $this->email($valueValidated, $titleValue);
                if ($value == "numeric")  $this->numeric($valueValidated, $titleValue);
                if ($value == "string")  $this->string($valueValidated, $titleValue);
                if (str_contains($value, "unique:")) $this->assertEquals(true ,$this->unique($value, $valueValidated, $titleValue));

            }
            return true;
        }

        if (is_string($validationType)) {

        }
    }

    private  function notFound($key): void
    {

        $this->validator[$key] = 'não foi passado.';
        $message[$key] = "{$key} não foi passado.";
        //session()->set("validate", $message);
    }


    private function required(string $value, string $key)
    {

        if(empty($value)){
            $this->validator[$key] =  "is required";
            $message[$key] = $key . "is required";
           // session()->set("validate", $message);
        }

    }


    private function email(string $value, string $key): void
    {

        if (false === \filter_var($value, FILTER_VALIDATE_EMAIL)) {
            $this->validator[$key] =  "Invalid Email";
            $message[$key] = "Invalid Email";
            //session()->set("validate", $message);
        }
    }

    private function numeric($value, string $key): void
    {

        if (!is_numeric($value)) {
            $this->validator[$key] =  "Invalid Number";
            $message[$key] = "Invalid Number";
           // session()->set("validate", $message);
        }
    }

    private function string(string $value, string $key): void
    {
        if (!is_string($value)) {
            $this->validator[$key] = "Invalid type string";
            $message[$key] = "Invalid type string";
           // session()->set("validate", $message);
        }
    }

    private  function unique(string $uniqueValidateValue, string $value, string $key)
    {
        $array = explode(":", $uniqueValidateValue);
        $valuesCheck = explode(",", $array[1]);
        $column = $valuesCheck[0];
        if(count($valuesCheck) > 2){
            $valueVerification = $valuesCheck[2];
            $columnVerification = $valuesCheck[3];
        }
        $model = 'Source\Models\\' . ucfirst($valuesCheck[1]);
        $this->assertEquals('Source\Models\User',$model);

        if (class_exists($model)) {
            $model = new $model();
            if(count($valuesCheck) > 2){
                $test = $model->where($column, $value)->orWhere($columnVerification,$valueVerification,'!=');
//                $this->assertEquals('', $model->where($column, $value)->orWhere($columnVerification,$valueVerification,'!=')->query);
                $exists = $model->where($column, $value)->orWhere($columnVerification,$valueVerification,'!=')->count();
            }else{
                $exists = $model->where($column, $value)->count();
            }

            $this->assertCount(10,$exists);

            if ($exists > 0) {
                $this->validator[$key] = " indiponivel";
                $message[$key] = $key . " indiponivel";
              //  session()->set("validate", $message);
            }
        }
        return true;
    }

}
