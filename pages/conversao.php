<?php
//criação da função que converte para a moeda de sua escolha

function validarReal($real){
    if(!is_numeric($real)){
        return false;
    }
    return true;
}
function validarEntrada($real,$converter){
    if(!preg_match('/\\d/', $converter) && validarReal($real) == true){
        return true;
    }else{
        return false;
    }
}
function mostrarMensagem($mensagem){
    echo $mensagem;
}
function realParaDolar($real,$dolar){
    $dolar = $real*0.19;
    return "<p>Valor em dólar: US$ {$dolar}</p>";
}
function realParaEuro($real, $euro){
    $euro = $real*0.16;
    return "<p>Valor em euro: EUR€ {$euro}</p>";
}
function realParaRupia($real, $euro){
    $rupia = $real*16.61;
    return "<p>Valor em euro: INR₹ {$rupia}</p>";
}
function formatarResultado($resultado){
    return number_format($resultado, 2, ",");
}

$real = filter_input(INPUT_GET,"real",FILTER_VALIDATE_FLOAT);
$converter = $_GET["converter"];

if(validarEntrada($real,$converter) == true){

    if($converter == "dolar"){
        $mensagem  = realParaDolar($real,formatarResultado($dolar));
    }
    elseif($converter == "euro"){
        $mensagem  = realParaEuro($real,formatarResultado($euro));
    }
    elseif($converter == "rupia"){
        $mensagem = realParaRupia($real, formatarResultado($rupia));
    }
    elseif($converter == "todas"){
        $mensagem  = realParaDolar($real,formatarResultado($dolar)).
        realParaEuro($real,formatarResultado($euro)).
        realParaRupia($real, formatarResultado($rupia));
    }
}else{
    header("Location: ../index.html");
}

?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./../css/style.css">
</head>
<body>
    <div class="mensagem">
        <?=mostrarMensagem("Olá, você escolheu a opção {$converter} o resultado é: ". "<p>Valor em real: R$ {$real}</p>");?>
        <?=$mensagem;?>
    </div>
</body>
</html>