<?php

namespace Source\Request;

use Source\Core\FormRequest;

class ProductRequest extends FormRequest
{

    public function attributes(){

        if(isset($this->value)){
            $this->value = format_money($this->value);
        }
    }

    public function rules()
    {

        switch ($this->method) {
            case 'POST':
            {
                return [
                    'product' => ['required', 'string'],
                    'category_id' => ['required','numeric'],
                    'value' => ['required', 'float'],
                    'size' => ['required'],
                    'qts' => ['required', 'numeric']
                ];
            }
            case 'PUT':
            case 'PATH':{
                return [
                    'product' => ['required', 'string','unique:product,product,' . $this->id .',id'],
                    'category_id' => ['required','numeric'],
                    'value' => ['required', 'float'],
                    'size' => ['required'],
                    'qts' => ['required', 'numeric']
                ];
            }
            default:
                break;
        }
    }
}