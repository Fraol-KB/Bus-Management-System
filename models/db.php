<?php

global $db;
$config = parse_ini_file("appconfig.ini", 1);
$user = $config['mysql_database']['db_username'];
$pass = $config['mysql_database']['db_password'];
$my_db = $config['mysql_database']['database'];
$server = $config['mysql_database']['db_host'];

if ($user === null OR $pass === null OR $my_db === null OR $server === null){

    throw new Exception("Check the Config File.");
}
try{

    $db = new PDO('mysql:host='.$server.';dbname='.$my_db, $user, $pass);
    //var_dump($db);
} catch (PDOException $e){

    echo 'Database Connection Failed: '. $e->getMessage();
}

function generateRandomString($length = 10) {
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
}