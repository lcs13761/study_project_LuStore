<?php

namespace Source\Request\Admin;

use Source\Core\FormRequest;

class CategoryRequest extends FormRequest
{

    public function rules(){
        switch ($this->method) {
            case 'POST':
            {
                return ['name' => ['required','string','unique:name,name']];
            }
            case 'PUT':
            case 'PATH':{
                return [
                    'name' => ['required','string','unique:name,name,'. $this->id .',id'],
                ];
            }
            default:
                break;
        }
    }

}