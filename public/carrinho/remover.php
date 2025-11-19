<?php
session_start();
if(isset($_POST['id']) && isset($_SESSION['carrinho'][$_POST['id']])) {
    unset($_SESSION['carrinho'][$_POST['id']]);
}
?>