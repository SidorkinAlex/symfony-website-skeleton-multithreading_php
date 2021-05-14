<?php
/**
 * Created by PhpStorm.
 * User: alex
 * Date: 04.04.21
 * Time: 12:39
 */
namespace App\Connection;

use Redis;

Class RedisConnection{
    public $redis;
    protected static $loadedConnection;
    function __construct()
    {
        $ip = $_SERVER['REDIS_IP'];
        $this->redis = new Redis();
        $this->redis->connect($ip);
    }

    public static function getConnections():RedisConnection
    {
        $connection = self::$loadedConnection;
        if(!empty($connection)){
            return $connection;
        }
        self::$loadedConnection = new RedisConnection();
        $connection = self::$loadedConnection;
        return new $connection;
    }
}