<?php

namespace Tests\Support\Migration\src\Config;



class ConfigMigration
{

    public function createFile(string $fileName){
       if(!file_exists(__DIR__ . "/../../../../../migrations")){
           mkdir(__DIR__ . "/../../../../../migrations",0777,true);
       }
       $fileName = ucfirst($fileName);
       if(file_exists(__DIR__ . "/../../../../../migrations/" .$fileName . ".php")){
           throw new \Exception("Arquivo ja existe");
       }
        $file = fopen("Migrations/" . $fileName . ".php",'w+');
        if($file){
            $text = $this->copyFile();
            $lines = $this->modifyClassName($text,$fileName);
            fwrite($file,$lines);
            fclose($file);
        }
    }

    private function copyFile():string {
        $fileNameReplace = __DIR__ . "/../Model/CreateTableModel.php";
        $fileCopy = fopen($fileNameReplace,'r');
        $text = fread($fileCopy,filesize($fileNameReplace));
        fclose($fileCopy);
        return $text;
    }

    private function modifyClassName(string $text,string $fileName):string {

        $lines = explode("\n",$text);
        $newLines = array();
        foreach ($lines as $line) {
            $newLines[] = preg_replace('/\s+/',' ',trim($line));
        }
        $searchValue = array_search("class CreateTableModel extends TypeColumn",$newLines);
        $searchNameSpace = array_search("namespace Model;",$newLines);
        $fileName = ucfirst($fileName);
        $newLines[$searchNameSpace] = "namespace Migrations\\" . $fileName  .";";
        $newLines[$searchValue] = "class $fileName extends TypeColumn";
        return implode("\n",$newLines);
    }

}