<?php

/**
 * 工廠方法模式
 * 不指定物件具體類型的情況下來建立物件
 * 定義介面(或抽象類別)，由實現此介面的類(或繼承此抽象類的類)來決定最後要得到的物件
 * 物件實體化推遲至子類別中進行
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

abstract class StorageFactory
{
    abstract protected function init(): Storage;

    public function createStorage()
    {
        $instance = $this->init();
        return $instance->getConnectionInfo();
    }
}

class Oracle extends StorageFactory
{

    private $config;

    public function __construct($config)
    {
        $this->config = $config;
    }

    public function init(): Storage
    {
        return new Mysql($this->config);
    }
}

class MS extends StorageFactory
{

    private $config;

    public function __construct($config)
    {
        $this->config = $config;
    }

    public function init(): Storage
    {
        return new Mssql($this->config);
    }
}

$storage = new Oracle(['connection' => 'mysql']);
$info = $storage->createStorage();
print_r($info);

$storage = new MS(['connection' => 'mssql']);
$info = $storage->createStorage();
print_r($info);