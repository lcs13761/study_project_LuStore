<?php

namespace Tests\Support\Migration;

use PHPUnit\Framework\TestCase;
use Tests\Support\Migration\src\StructureMigration;
use Tests\Support\Migration\src\TypeColumn;


class TestMigration extends TestCase
{

    public function testCreat(){
        StructureMigration::createTable('test', function(TypeColumn $table){
         return array(
             $table->id()->unique()->createRow(),
             $table->string('name')->notNull()->createRow(),
             $table->string("email")->unique()->notNull()->createRow(),
             $table->bigInt('product_id')->notNull()->createRow(),
             $table->foreignKey('product_id')->references('product')->cascade()->createRow()
         );
        });
    }

    public function testId()
    {
        $this->assertEquals("`id` bigInt unsigned NOT NULL UNIQUE", call_user_func($this->type->id()->unique()));
    }

    public function testInteger(){
        $this->assertEquals('`year` INT NOT NULL',call_user_func($this->type->integer('year')->notNull()));
    }

    public function timestamp(){
        $this->assertEquals('`test` timestamp UNIQUE NOT NULL DEFAULT 0',call_user_func($this->type->timestamp('test')->unique()->notNull()->default('0')));
    }

    public function testCreateAt()
    {
        $this->assertEquals('`created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP', call_user_func($this->type->createAt()));
    }

    public function testUpdateAt()
    {
        $this->assertEquals('`updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP', call_user_func($this->type->updateAt()));
    }



}