<?php

namespace Core;

use \PDO;
use \Exception;

class DB
{
    public static $conn;
    public static function connect()
    {
        try {
            $opt = array(
                PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8",
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
            );
            $db_host = config('DB_HOST');
            $db_name = config('DB_NAME');
            $db_user = config('DB_USER');
            $db_pass = config('DB_PASS');
            DB::$conn = new PDO(
                "mysql:host=$db_host;dbname=$db_name",
                $db_user,
                $db_pass,
                $opt
            );
            // echo 'Connected successfully';
        } catch (Exception $e) {
            echo 'Connection failed: ' . $e->getMessage();
        }
    }
    public static function get($sql)
    {
        DB::connect();
        $result = DB::$conn->query($sql);
        $result = $result->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }
    public static function getOne($sql)
    {
        DB::connect();
        $result = DB::$conn->query($sql);
        $row = $result->fetch(PDO::FETCH_ASSOC);
        return $row;
    }
    public static function execute($sql)
    {
        DB::connect();
        $result = DB::$conn->exec($sql);
        return $result;
    }
    public function insert($data)
    {
        $now = date('Y-m-d H:i:s');
        $timeStamp = ['created_at' => $now, 'updated_at' => $now];
        $data = array_merge($data, $timeStamp);
        foreach ($data as $key => $value) {
            $fields[] = "`{$key}`";
            $values[] = "'{$value}'";
        }

        $fields = implode(',', $fields);
        $values = implode(',', $values);


        // INSERT INTO table() VALUES ()
        $sql = "INSERT INTO {$this->table}({$fields}) VALUES({$values})";
        DB::execute($sql);
    }
}
