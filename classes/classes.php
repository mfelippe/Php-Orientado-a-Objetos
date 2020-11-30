<?php

class Caneta{

    public $modelo;
    public $cor;

    public function Caneta($m, $c, $p){//método construtor pode-se usar __construction() no lugar do nome da classe
        $this->modelo=$m;
        $this->cor=$c;
        $this->ponta=$p;
        $this->tampar();
    }
    private $ponta;
    public function getCor(){
        return $this->cor;
    }public function  setCor($c){
            $this->cor=$c;
    }
    public function getModelo(){
        return $this->modelo;
    }
    public  function setModelo($m){
        $this->modelo=$m;
    }public function getPonta(){
        return $this->ponta;
    }public function setPonta($p){
        $this->ponta=$p;
    }
    protected $tampada;

    public function rabiscar(){
        if($this->tampada==True){
            echo "<p>Asssim não dá para escrever</p>";
        }else{
            echo "<h2>Consigo escrever qualquer coisa</h2>";
        }
    }
    public function tampar(){
        $this->tampada=true;
    }public function destampar(){
        $this->tampada=false;
    }
}
