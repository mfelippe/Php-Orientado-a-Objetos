<?php
require_once 'interfaces/Controlador.php';
class Luta{
    //Atributos
    private $desafiado;
    private $desafiante;
    private $rounds;
    private $aprovada;
    //Métodos Publicos
    public function marcarLuta($l1, $l2){
        if($l1->getCategoria() == $l2->getCategoria() && ($l1 != $l2)){
            $this->aprovada= true;
            $this->desafiado=$l1;
            $this->desafiante=$l2;
        }else{
            $this->aprovada= false;
            $this->desafiado= null;
            $this->desafiante= null;
        }
    }
    public function lutar(){
        if($this->aprovada){
            $this->desafiante->apresentar();
            $this->desafiado->apresentar();
            $vencedor = rand(0,2); //número randomico de 0 a 2;
            switch ($vencedor){
                case 0://empate
                    echo"<h3>Empate</h3>";
                    $this->desafiado->empatarluta();
                    $this->desafiante->empatarluta();
                    break;
                case 1: //desafiado vence
                    echo"<h3> Desafiado Venceu </h3>";
                    $this->desafiado->ganharluta();
                    $this->desafiante->perderluta();
                    break;
                case 2:
                    echo"<h3> Desafiante Venceu </h3>";
                    $this->desafiado->perderluta();
                    $this->desafiante->ganhaluta();
                    break;

            }
        }
    }

    /**
     * Métodos Especiais
     */
    public function getDesafiado()
    {
        return $this->desafiado;
    }

    public function setDesafiado($desafiado)
    {
        $this->desafiado = $desafiado;
    }
    public function getDesafiante()
    {
        return $this->desafiante;
    }
    public function setDesafiante($desafiante)
    {
        $this->desafiante = $desafiante;
    }
    public function getRounds()
    {
        return $this->rounds;
    }
    public function setRounds($rounds)
    {
        $this->rounds = $rounds;
    }

    public function getAprovada()
    {
        return $this->aprovada;
    }
    public function setAprovada($aprovada)
    {
        $this->aprovada = $aprovada;
    }


}
class Lutador{ //objetos composto
    //Stributos
    private $nome;
    private $nacionalidade,$idade,$altura, $peso,$categoria,$vitorias,$derrotas,$empates;
    //métodos
    function apresentar(){
        echo "<p>--------------------------------------------------</p>" ;
        echo "<p> O Lutador ".$this->getNome()."</p>";
        echo "<p>Nacionalidade ".$this->getNacionalidade()."</p>";
        echo "<p>idade: ".$this->getIdade() ."</p>";
        echo "<p>Luta na categoria " .$this->getCategoria()."</p>";
        echo "<p>Vitorias :".$this->getVitorias(). "  Derrotas:"  .$this->getDerrotas()."</p>";
        echo "<p>---------------------------------------------------</p>";
    }
    function status(){
        echo "<p>--------------------------------------</p>";
        echo "<p> O Lutador ".$this->getNome()."</p>";
        echo "<p> Está na catergoria ".$this->getCategoria()."</p>";
    }
    function ganharLuta(){
        //$this->setVitorias($this->getVitorias()+1);
        $this->vitorias=$this->vitorias+1;
    }
    function perderLuta(){
        $this->derrotas=$this->derrotas+1;
    }
    function empatarLuta(){}
    //métodos especiais
    public function __construct($nome, $nacionalidade, $idade, $altura, $peso, $vitorias, $derrotas, $empates)
    {
        $this->nome = $nome;
        $this->nacionalidade = $nacionalidade;
        $this->idade = $idade;
        $this->altura = $altura;
        $this->setPeso($peso);
        $this->vitorias = $vitorias;
        $this->derrotas = $derrotas;
        $this->empates = $empates;
    }

    /**
     * @return mixed
     */
    public function getNome()
    {
        return $this->nome;
    }

    /**
     * @param mixed $nome
     */
    public function setNome($nome)
    {
        $this->nome = $nome;
    }

    /**
     * @return mixed
     */
    public function getNacionalidade()
    {
        return $this->nacionalidade;
    }

    /**
     * @param mixed $nacionalidade
     */
    public function setNacionalidade($nacionalidade)
    {
        $this->nacionalidade = $nacionalidade;
    }

    /**
     * @return mixed
     */
    public function getIdade()
    {
        return $this->idade;
    }

    /**
     * @param mixed $idade
     */
    public function setIdade($idade)
    {
        $this->idade = $idade;
    }

    /**
     * @return mixed
     */
    public function getAltura()
    {
        return $this->altura;
    }

    /**
     * @param mixed $altura
     */
    public function setAltura($altura)
    {
        $this->altura = $altura;
    }

    /**
     * @return mixed
     */
    public function getPeso()
    {
        return $this->peso;
    }

    public function setPeso($peso)
    {
        $this->peso = $peso;
        $this->setCategoria();
    }

    public function getCategoria()
    {
        return $this->categoria;
    }

    public function setCategoria()
    {
        if($this->peso<52.2){
            $this->categoria="INVALIDA";
        }elseif ($this->peso<=70.3){
            $this->categoria="LEVE";
        }elseif ($this->peso<=83.9){
            $this->categoria="Medio";
        }elseif ($this->peso<=120.2){
            $this->categoria="PESADO";
        }else{
            $this->categoria="INVALIDO";
        }
    }

    public function getVitorias()
    {
        return $this->vitorias;
    }

    public function setVitorias($vitorias)
    {
        $this->vitorias = $vitorias;
    }


    public function getDerrotas()
    {
        return $this->derrotas;
    }

    public function setDerrotas($derrotas)
    {
        $this->derrotas = $derrotas;
    }

    public function getEmpates()
    {
        return $this->empates;
    }

    public function setEmpates($empates)
    {
        $this->empates = $empates;
    }



}
class ControleRemoto implements Controlador{ //class com encapsulamento
    //atributos
    private $volume;
     private $ligado;
     private $tocando;
    //métodos

   function __construct(){
        $this->ligado= false;
        $this->tocando= false;
        $this->volume=25;
    }


    private function getVolume()
    {
        return $this->volume;
    }

    private function setVolume($volume)
    {
        $this->volume = $volume;
    }

    private function getLigado()
    {
        return $this->ligado;
    }

    private function setLigado($ligado)
    {
        $this->ligado = $ligado;
    }

    private function getTocando()
    {
        return $this->tocando;
    }

    private function setTocando($tocando)
    {
        $this->tocando = $tocando;
    }
    // metodos encapsulados
    public function ligar()
    {
       $this->setLigado(true);
    }
    public function desligar()
    {
       $this->$this->setLigado(false);
    }
    public function abrirMenu()
    {
        echo "<br> Está Ligado ?".($this->getLigado()?" sim": " Não");
        echo "<br> Está Tocando ?".($this->getTocando()?" sim": " Não");
        echo "<br> volume: ".$this->getVolume();

        for($i=0; $i<= $this->getVolume(); $i+=5){
            echo " |";
        } echo"<br>";
    }
    public function fecharMenu()
    {
        echo"<br> Fechando Menu...";
    }
    public function maisVolume()
    {
        if($this->getLigado()){
            $this->setVolume($this->getVolume()+5);
        }
    }
    public function menosVolume()
    {
        if($this->getLigado()){
            $this->setVolume($this->getVolume()-5);
        }
    }
    public function play()
    {
        if($this->getLigado() && $this->getTocando()){
            $this->setTocando(true);
        }
    }
    public function pause()
    {
        if($this->getLigado() && $this->getTocando()){
            $this->setTocando(false);
        }
    }

}
class Caneta{ //class simples

    public $modelo;
    public $cor;

    public function __construct($m, $c, $p){//método construtor pode-se usar __construction() no lugar do nome da classe
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

