<?php

namespace Source\Models;

use Source\Core\Database\Model;

class Product extends Model
{
    protected array $fillable = ['image','name',"category_id",'value','qts','size'];
    protected string $table = 'products';
    protected array $protected = ['id','created_at','updated_at'];
}
