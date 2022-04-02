<?php

class Dbh
{
    protected function connect()
    {
        try {
            $host_name = 'localhost';
            $db_port = 3454;
            $db_name = 'login_system';
            $user_name = "root";
            $password = "";
            $dsn = 'mysql:host=' . $host_name . ':' . $db_port . ';dbname=' . $db_name . ';charset=utf8';

            $dbh = new PDO($dsn, $user_name, $password);

            return $dbh;

        } catch (PDOException $e){
            print "Error!: " . $e->getMessage() . "<br>";
            die();
        }
    }
}