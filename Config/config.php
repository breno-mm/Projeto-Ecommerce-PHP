<?php 
session_set_cookie_params(['lifetime' => 0, 'httponly' => true]);

$seconds = 14400;

if (!isset($_SESSION)) {
    session_start();
    $time = "";
    if ($seconds != 0) 
        $time = time();     
    
    setcookie(session_name(), session_id(), $time + $seconds);

} else {
    $cookieParams = session_get_cookie_params();
    session_set_cookie_params(
        $seconds,
        $cookieParams['path'],
        $cookieParams['domain'],
        $cookieParams['secure']
    );
}

function modDev($var){
    
    $newid = session_create_id('dsbd-');
    if($var){
        //Modo desenvolvimento
        ini_set('display_errors', 1); 
        error_reporting(E_ALL);
        
    }else{
        //Habilita 1 desabilita 0.
        ini_set('display_errors', 0); 
        error_reporting(~E_ALL);
    }
}


// Versão do sistema
$_SESSION['version'] = "2025.00.01 - ALPHA";

// Copyright
$_SESSION['copyright'] = "Rafael Leonardo Frasson";

include "../Config/conexao.php";