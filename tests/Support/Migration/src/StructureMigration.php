<?php

namespace Tests\Support\Migration\src;

use PHPUnit\Framework\TestCase;

class StructureMigration extends TestCase
{
    public static function createTable(string $table, $callback)
    {
       self::assertIsString($table);
       self::assertIsArray($callback(new TypeColumn));
       $callbackNew = $callback(new TypeColumn);
      self::assertTrue( self::testCreateQuery($table, $callbackNew));
    }

    private static function testCreateQuery(string $table,array $callback){
        $queryCreate = "CREATE TABLE `$table`";
        $valuesInTable = implode(",",$callback);
        $queryFinally = $queryCreate . "(".$valuesInTable.")";
        self::assertEquals("",$queryFinally);

}

}