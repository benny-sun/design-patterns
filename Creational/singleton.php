<?php

/**
 * 確保在process中，操作同一個物件
 */

final class Database
{

    private static $instance = null;
    private $host, $dbname, $user, $password;

    public function __construct($host, $dbname, $user, $password)
    {
        $this->host = $host;
        $this->dbname = $dbname;
        $this->user = $user;
        $this->password = $password;
    }

    public static function init(...$settings)
    {
        if (null === self::$instance) {
            self::$instance = new self(...$settings);
        }
        return self::$instance;
    }

    private function __clone()
    {
        // Disable cloning
    }

    private function __wakeup()
    {
        // Disable unserialize
    }
}

$db1 = Database::init('127.0.0.1', 'example', 'tester', 'tester');
$db2 = Database::init('127.0.0.1', 'example', 'tester', 'tester');
var_dump($db1 === $db2); // true

$db3 = new Database('127.0.0.1', 'example', 'tester', 'tester');
$db4 = new Database('127.0.0.1', 'example', 'tester', 'tester');
var_dump($db3 === $db4); // false

$db99 = unserialize(serialize($db1));
var_dump($db1 === $db99); // false

$db100 = clone $db1;
var_dump($db1 === $db100); // error
