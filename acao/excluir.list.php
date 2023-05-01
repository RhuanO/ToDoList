<?php

require_once(str_replace('\\', '/', dirname(__FILE__, 2)) . './DAO/TodoDAO.php');
require_once(str_replace('\\', '/', dirname(__FILE__, 2)) . './classes/lista.class.php');

$lista = new lista();

if (isset($_GET) && isset($_GET['key'])) {
    $id = filter_input(INPUT_GET, 'key');

    $dao = new DAO();


    $resultado = $dao->Excluir($id);

    if ($resultado) {
        $_SESSION['mensagem'] = "Removido com sucesso";
        $_SESSION['sucesso'] = true;
        
    } else {
        $_SESSION['mensagem'] = "Erro ao remover";
        $_SESSION['sucesso'] = false;
        
    }
    header('Location:../index.php');
}
else {
    
    header('Location:../index.php');
}