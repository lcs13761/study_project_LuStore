<?php

namespace Source\Request;

use Source\Core\FormRequest;

class CategoryRequest extends FormRequest
{

    public function rules(){
        switch ($this->method) {
            case 'POST':
            {
                return ['category' => ['required','string','unique:category,category']];
            }
            case 'PUT':
            case 'PATH':{
                return [
                    'category' => ['required','string','unique:category,category,'. $this->id .',id'],
                ];
            }
            default:
                break;
        }
    }

}