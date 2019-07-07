<?php

/**
 * 簡單工廠模式
 * 不用考慮物件是如何生成的，把參數拋進去，就會得到對應的物件
 */

interface Storage
{
    public function getConnectionInfo();
}


class Mysql implements Storage
{

    protected $info;

    public function __construct(array $info)
    {
        $this->info = $info;
    }

    public function getConnectionInfo(): array
    {
        return $this->info;
    }
}


class Mssql implements Storage
{

    protected $info;

    public function __construct(array $info)
    {
        $this->info = $info;
    }

    public function getConnectionInfo(): array
    {
        return $this->info;
    }
}

/************* */

class SimpleStorageFactory
{
    public static function createStorage(array $info): Storage
    {
        switch ($info['connection']) {
            case 'mysql':
                return new Mysql($info);
            case 'mssql':
                return new Mssql($info);
        }
    }
}

$storage = SimpleStorageFactory::createStorage(['connection' => 'mysql']);
$info = $storage->getConnectionInfo();