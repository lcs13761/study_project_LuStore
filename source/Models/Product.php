<?php

namespace Source\Models;

use Source\Core\Model;

class Product extends Model
{
    protected array $fillable = ['product','description','value','qts','size'];
    protected string $table = 'products';
    protected array $protected = ['id','created_at','updated_at'];
}
