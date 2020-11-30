<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Php orientado</title>
</head>
<body>
    <pre><?php
    # pegando o modelo de classes
    require_once 'classes/classes.php';
    #criando o objeto com a classe caneta
    $c1 = new Caneta("bic","preta",0.7);

    print_r($c1)

    ?></pre>
</body>
</html>