<?php
class lista{
    
    private $id;
    private $atividade;
    private $conclusao;
    private $condicao;
    
    public function setId($id)
    {
        $this->id = $id;
    }

    public function getId()
    {
        return $this->id;
    }

    public function setatividade($atividade)
    {
        $this->atividade = $atividade;
    }

    public function getatividade()
    {
        return $this->atividade;
    }
    
    public function setconclusao($conclusao)
    {
        $this->conclusao = $conclusao;
    }

    public function getconclusao()
    {
        return $this->conclusao;
    }

    public function setcondicao($condicao)
    {
        $this->condicao = $condicao;
    }

    public function getcondicao()
    {
        return $this->condicao;
    }
}