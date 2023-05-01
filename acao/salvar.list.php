<?php
session_start();
require_once(str_replace('\\', '/', dirname(__FILE__, 2)) . './classes/lista.class.php');
require_once(str_replace('\\', '/', dirname(__FILE__, 2)) . './DAO/TodoDAO.php');

$lista = new lista();
$dao = new DAO();

if (isset($_POST) && isset($_POST['id']) && !empty($_POST['id'])) {
    $id         = intval(addslashes(filter_input(INPUT_POST, 'id')));
    $atividade       = addslashes(filter_input(INPUT_POST, 'atividade'));
    $conclusao   = addslashes(filter_input(INPUT_POST, 'conclusao'));
    $condicao       = addslashes(filter_input(INPUT_POST, 'condicao'));

    if (empty($atividade)) {
        $_SESSION['mensagem'] = "Obrigatório informar Atividade";
        $_SESSION['sucesso'] = false;

        header('Location:../index.php');
        die();
    }
    $lista->setId($id);
    $lista->setatividade($atividade);
    $lista->setconclusao($conclusao);
    $lista->setcondicao($condicao);

    $resultado = $dao->Editar($lista);
    $_SESSION['mensagem'] = "Obrigatório informar Atividade2";
    header('Location:../index.php');
} else {

    if  (isset($_POST['condicao'])) {
        $condicao='on';
    }
    else {
        $condicao='';
    }
    $id = isset($_POST['id']) ? $_POST['id'] : null;
    $atividade       = addslashes(filter_input(INPUT_POST, 'atividade'));
    $conclusao   = addslashes(filter_input(INPUT_POST, 'conclusao'));
    // $condicao       = addslashes(filter_input(INPUT_POST, 'condicao'));
    if  (isset($_POST['condicao'])) {
        $condicao='on';
    }
    else {
        $condicao='';
    }
    $lista->setId($id);
    $lista->setatividade($atividade);
    $lista->setconclusao($conclusao);
    $lista->setcondicao($condicao);

    $resultado = $dao->Adicionar($lista);
    var_dump($lista);
    header('Location:../index.php');
}
