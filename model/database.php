<?php

class database
{
    private static $connection;

    private static $settings = array(
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8",
        PDO::ATTR_EMULATE_PREPARES => false,
    );

    public static function connect($host, $user, $pass, $db)
    {
        if (!isset(self::$connection))
        {
            self::$connection = @new PDO(
                "mysql:host=$host;dbname=$db",
                $user,
                $pass,
                self::$settings
            );
        }
    }

    public static function get($sql, $param = array())
    {
        $result = self::$connection->prepare($sql);
        $result->execute($param);
        return $result->fetch();
    }

    public static function find($sql, $param = array())
    {
        $result = self::$connection->prepare($sql);
        $result->execute($param);
        return $result->fetchAll();
    }

    public static function insert($sql, $param)
    {
        $result = self::$connection->prepare($sql);
        $result->execute($param);
        return $result->rowCount();
    }
}