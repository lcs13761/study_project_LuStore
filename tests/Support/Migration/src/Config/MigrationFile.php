<?php

namespace Tests\Support\Migration\src\Config;

use Migrations;


class MigrationFile
{

    public function actionMigration(){
        $directory = __DIR__ . "/../../../../../migrations";
        if(!file_exists($directory)){
            throw new \Exception('error');
        }
        $dir = glob($directory . "/*");
        foreach($dir as $test){
            $array = explode('\\',$test);
            foreach($array as $value){
                $array = explode('/',$value);
                $array = array_pop($array);
                $model = 'Migrations\\' . str_replace('.php' , "", $array);
                if (class_exists($model)) {
                    $model = new $model();
                    var_dump($model->up());
                }
            }
        }
    }

}