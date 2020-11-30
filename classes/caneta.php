<?php
class Bic
{
    public $modelo;
    private $ponta;


    public function _constrution(){

        $this->modelo = "compac";
    }

    public function getModelo(){
        return $this->modelo;
    }
    public function setModelo(){
        return $this-> modelo = $m;
    }
    public function getPonta(){
        return $this->ponta;
    }public function  setPonta(){
        $this->ponta = $p;
}

}
class Caneta{

    public $modelo;
    public $cor;
    private $ponta;
    protected $tampada;

    public function rabiscar(){
        if($this->tampada==True){
        echo "<p>estou rabiscando de mentirinha</p>";
        }else{
            echo "<h2>ERRRO</h2>";
        }
    }
    public function tampar(){
        $this->tampada=true;
    }public function destampar(){
        $this->tampada=false;
    }
}
