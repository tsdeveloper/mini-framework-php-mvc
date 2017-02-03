<?php


namespace App;


class Conn
{
    public static function getDB()
    {
return new \PDO("mysql:host=localhost:3307;dbname=dbschoolofnet","root","root");
    }
}