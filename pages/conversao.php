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

$real = filter_input(INPUT_GET,"real",FILTER_VALIDATE_FLOAT);
$converter = $_GET["converter"];

if(validarEntrada($real,$converter) == true){

    if($converter == "dolar"){
        $mensagem  = realParaDolar($real,$dolar);
    }
    elseif($converter == "euro"){
        $mensagem  = realParaEuro($real,$euro);
    }
    elseif($converter == "rupia"){
        $mensagem = realParaRupia($real, $rupia);
    }
    elseif($converter == "todas"){
        $mensagem  = realParaDolar($real,$dolar). 
        realParaEuro($real,$euro).
        realParaRupia($real, $rupia);
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
        <?=mostrarMensagem("Olá, você escolheu a opção {$converter} o resultado é: ");?>
        <?=mostrarMensagem("<p>Valor em real: R$ {$real}</p>");?>
        <?=$mensagem;?>
    </div>
</body>
</html>