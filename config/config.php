<?php

@session_start();

//Dados de conexão com o banco de dados
define("HOST", "localhost");
define("USER", "root");
define("PSW", "");

//Url base para quando houver troca de servidor
define("BASE_URL", "/xadrez/");

spl_autoload_register(function ($class) {
    //$class = strtolower($class);
    $class = str_replace("\\", '/', $class . '.php');
    if (file_exists($class)) {
       require_once($class);
    }
});