<?php


namespace SON\DI;


use App\Conn;

class Container
{
    public static function getModel($model)
    {
       $class = "\\App\\Models\\".ucfirst($model);
       return new $class(Conn::getDB());
    }
}