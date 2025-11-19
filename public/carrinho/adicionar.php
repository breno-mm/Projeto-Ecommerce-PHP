<?php
// Configura o cookie da sessão para valer em todo o site
session_set_cookie_params(0, '/');
session_start();

if (isset($_POST['id'])) {
    $idProduto = (int)$_POST['id'];

    if (!isset($_SESSION['carrinho'])) {
        $_SESSION['carrinho'] = [];
    }

    if (isset($_SESSION['carrinho'][$idProduto])) {
        $_SESSION['carrinho'][$idProduto]++;
    } else {
        $_SESSION['carrinho'][$idProduto] = 1;
    }
    session_write_close(); 
    
    echo "sucesso";
} else {
    echo "erro_id";
}
?>