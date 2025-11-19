<?php
$seconds = 14400;
// Só define parâmetros se a sessão ainda NÃO estiver ativa
if (session_status() !== PHP_SESSION_ACTIVE) {

    session_set_cookie_params([
        'lifetime' => $seconds,
        'path'     => '/',
        'domain'   => '',
        'secure'   => false, 
        'httponly' => true,
        'samesite' => 'Lax'
    ]);

    session_start();

} else {
    // Sessão já ativa → Não pode alterar cookie
    // Apenas continua silenciosamente
}


// Função modo dev
function modDev($var){
    if ($var) {
        ini_set('display_errors', 1);
        error_reporting(E_ALL);
    } else {
        ini_set('display_errors', 0);
        error_reporting(0);
    }
}


// Versão
$_SESSION['version'] = "2025.00.01 - ALPHA";

// Copyright
$_SESSION['copyright'] = "Rafael Leonardo Frasson";

// Conexão com banco
include "../Config/conexao.php";
