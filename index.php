<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Php orientado</title>
</head>
<body>
    <h1> Projeto de encapsulamento</h1>
    <pre><?php
    # pegando o modelo de classes
    require_once 'classes/classes.php';
    require_once 'interfaces/Controlador.php';
    $c = new ControleRemoto();
    $c->ligar();
    $c->maisVolume();
    $c->abrirMenu();
    echo "<hr>";


    //trabalhando com objeto composto: class Lutador
    $l = array();
    $l[0] =new Lutador("Pretty Boy", "França", 30,1.75,70,11,12,2);
    $l[1] =new Lutador("Putcript", "Brasil", 29,1.68,60,14,2,3);
    $l[2] =new Lutador("Felippe", "Brasil", 29,1.68,60,14,2,3);

    // laço em for para mostrar todos os lutadores cadastrados
    $fim = count($l);
    for($i=0; $i<1 ;$i++) {
        $l[$i]->apresentar();
    }
    ?></pre>
</body>
</html>