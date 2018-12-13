<?php

define('HOST', 'localhost');
define('USER', 'zaira');
define('PASSWORD', '');
define('DB', 'test');

class credentials
{
    public function Get()
    {
        return (array("host" => HOST, "user" => USER, "password" => PASSWORD, "db" => DB));
    }
}
