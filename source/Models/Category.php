<?php

namespace Source\Models;

use Source\Core\Database\Model;

class Category extends Model
{
    protected array $fillable = ['name'];
    protected string $table = 'categories';
    protected array $protected = ['id'];


    public function product(){
        return Product::class;
    }
}