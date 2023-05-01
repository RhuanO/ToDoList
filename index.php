<?php
session_start();
require_once("./classes/lista.class.php");

?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>To-Do List</title>
    <link rel="stylesheet" href="css/style.css">
</head>

<body>

    <div class="main-section">
        <h1 style="text-align: center; padding-top:5px">Lista de Tarefas</h1>
        <div class="add-section">

            <form action="./acao/salvar.list.php" class="form1" method="POST" autocomplete="off">

                <input type="text" name="atividade" placeholder="Lista de Tarefas" />

                <input type="date" name="conclusao" id="conclusao">

                <div class="box">

                    <input class="chkfunc" style="width:30px; margin: 0px; font-size: 1rem; " type="checkbox" name="condicao" value="" id="chkfunc">
                    <label for="condicao">Concluido</label>
                </div>
                <button type="submit">Adicionar</button>

            </form>
        </div>

        <div class="show-todo-section">

            <?php

            require_once("./DAO/TodoDAO.php");

            $dao = new DAO();

            $lista = $dao->BuscarTodos();

            foreach ($lista as $l) { ?>

                <div class="todo-item">

                    <form action="./acao/salvar.list.php" method="POST">

                        <input placeholder="concluido" type="checkbox" <?php if ($l->getcondicao() == 'on') {
                                                                            echo 'checked';
                                                                        } ?> class="check-box" data-todo-id="" name="condicao" Caixa />

                        <input type="text" value="<?= $l->getatividade() ?>" name="atividade" id="">

                        <input type="date" name="conclusao" value="<?= $l->getconclusao() ?>" id="">

                        <input type="hidden" name="id" value="<?= $l->getId() ?>">


                        <input type="submit" class="remove-to-do" id="#" value="Alterar">

                        <a type="submit" class="remove-to-do" href="./acao/excluir.list.php?key=<?= $l->getId() ?>">Excluir</a>

                    </form>
                </div>
            <?php }; ?>
        </div>
    </div>
</body>

</html>