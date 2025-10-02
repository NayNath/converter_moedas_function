<?php
//- criação da página php sem functions mas funcional

$real = filter_input(INPUT_GET,"real",FILTER_VALIDATE_FLOAT);
$content = $_GET["content"];

if($content == "dolar"){
    $dolar = $real*0.19;
    $mensagem  = "<p>Valor em real: R$ {$real}</p>".
                    "<p>Valor em dólar: US$ {$dolar}</p>";
}
elseif($content == "euro"){
    $euro = $real*0.16;
    $mensagem  = "<p>Valor em real: R$ {$real}</p>".
                    "<p>Valor em euro: EUR€ {$euro}</p>";
}
elseif($content == "rupia"){
    $rupia = $real*16.61;
    $mensagem  = "<p>Valor em real: R$ {$real}</p>".
                    "<p>Valor em euro: INR₹ {$rupia}</p>";
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <div class="mensagem">
        <?=$mensagem;?>
    </div>
</body>
</html>