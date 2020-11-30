<?php
interface Controlador{ //encapsulamento para classes
    public function ligar(); #abstract quer dizer que o método é desenvolvido em uma class
    public function desligar();
    public function abrirMenu();
    public function fecharMenu();
    public function maisVolume();
    public function menosVolume();
    public function play();
    public function pause();

}