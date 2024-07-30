<?php
session_start();

// Limpa todas as variáveis de sessão (user & pass)
$_SESSION = array();

// Destroi a Sessão (LogOut)
session_destroy();

// Redireciona para a página de login
echo "<script>alert('Desconectou com Sucesso!'); window.location='../index.php';</script>";
exit;
?>
