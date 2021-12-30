<?php


use Luke\Migration\MethodType;
use Luke\Migration\Schema;

class CreateAllTables
{
    public function up()
    {
        Schema::create("users", function (MethodType $table) {
            return array(
                $table->id()->unique()->autIncrement()->createRow(),
                $table->bigInt("auth_id")->createRow(),
                $table->string('photo')->createRow(),
                $table->string('name')->notNull()->createRow(),
                $table->string('email')->unique()->notNull()->createRow(),
                $table->string('password')->createRow(),
                $table->integer('level')->default(1)->createRow(),
                $table->string('email_verified')->createRow(),
                $table->datetime('email_verification_at')->createRow(),
                $table->createAt()->createRow(),
                $table->updateAt()->createRow(),
            );
        });

        Schema::create("categories", function (MethodType $table) {
            return array(
                $table->id()->unique()->autIncrement()->createRow(),
                $table->string('name')->notNull()->unique()->createRow()
            );
        });

        Schema::create("products", function (MethodType $table) {
            return array(
                $table->id()->unique()->autIncrement()->createRow(),
                $table->integer('category_id')->unsigned()->notNull()->createRow(),
                $table->string('image')->createRow(),
                $table->string('name')->notNull()->unique()->createRow(),
                $table->float('value')->notNull()->createRow(),
                $table->integer('qts')->notNull()->createRow(),
                $table->string('size')->notNull()->createRow(),
                $table->createAt()->createRow(),
                $table->updateAt()->createRow(),
                $table->foreignKey('category_id')->references('categories')->createRow()
            );

        });
    }

}