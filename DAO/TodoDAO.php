<?php

require_once(str_replace('\\', '/', dirname(__FILE__, 2)) . './config/conexao.php');
require_once(str_replace('\\', '/', dirname(__FILE__, 2)) . './classes/lista.class.php');
class DAO
{
    function Adicionar(lista $lista)
    {

        $pdo = conectDb();
        $pdo->beginTransaction();

        try {
            $stmt = $pdo->prepare("INSERT INTO lista(atividade, conclusao, condicao) VALUE(?,?,?)");

            $stmt->bindValue(1, $lista->getatividade());
            $stmt->bindValue(2, $lista->getconclusao());
            $stmt->bindValue(3, $lista->getcondicao());
            $stmt->execute();
            $pdo->commit();
            var_dump($lista);
            return true;
        } catch (PDOException $i) {
            $_SESSION['mensagem']= 'Erro ao inserir' . $i->getMessage();
            $pdo->rollBack();
            die();
        }
    }

    function BuscarTodos()
    {
        $pdo = conectDb();
        try {
            $stmt = $pdo->prepare("SELECT * FROM lista");
            $stmt->execute();
            $lista = new lista();
            $retorno = array();
            while ($rs = $stmt->fetch(PDO::FETCH_OBJ)) {
                $lista->setId($rs->id);
                $lista->setatividade($rs->atividade);
                $lista->setconclusao($rs->conclusao);
                $lista->setcondicao($rs->condicao);

                $retorno[] = clone $lista;
            }
            return $retorno;
        } catch (PDOException $ex) {
            echo "Erro ao buscar atividade: " . $ex->getMessage();
            die();
        }
    }

    public function Editar(lista $lista)
    {
        $pdo = conectDb();
        $pdo->beginTransaction();
        try {
            $stmt = $pdo->prepare("UPDATE lista SET atividade = ?, conclusao = ?, condicao = ? WHERE id = ?");
            $stmt->bindValue(1, $lista->getatividade());
            $stmt->bindValue(2, $lista->getconclusao());
            $stmt->bindValue(3, $lista->getcondicao());
            $stmt->bindValue(4, $lista->getId());
            var_dump($lista);
            $stmt->execute();

            if ($stmt->rowCount()) {
                $pdo->commit();
                return TRUE;
            }
            return FALSE;
        } 
        catch (PDOException $ex) {
            $pdo->rollBack();
            echo "Erro ao atualizar a lista: " . $ex->getMessage();
            die();
        }
    }

    public function Excluir($id)
    {
        $pdo = conectDb();
        $pdo->beginTransaction();
        try {
            $stmt = $pdo->prepare("DELETE FROM lista WHERE id = ?");
            $stmt->bindValue(1, $id);
            $stmt->execute();

            if ($stmt->rowCount()) {
                $pdo->commit();
                return TRUE;
            }
            return FALSE;
        } 
        catch (PDOException $ex) {
            $pdo->rollBack();
            echo "Erro ao atualizar a lista: " . $ex->getMessage();
            die();
        }
    }
}
