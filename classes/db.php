<?php

class dbConn
{
    private static $conn;
    public static function dbConnection()
    {
        if (self::$conn === null) {
            self::$conn = new PDO('mysql:host=localhost;dbname=todo_db', "root", "root");
            return self::$conn;
        } else {
            return self::$conn;
        }
    }
}
