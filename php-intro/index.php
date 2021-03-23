<?php

$categorias = [];

$categorias[] = 'infantil';
$categorias[] = 'adolecente';
$categorias[] = 'adulto';

//teste de array 
//print_r($categorias);

$nome = 'Eduardo';
$idade = 20;

//teste de var_dump info variaveis 
//var_dump($nome);
//var_dump($idade);

if($idade < 6){
    echo'Não tem idade suficiente para competir';
}else if($idade >= 6 && $idade <= 12){
    for($i = 0; $i < count($categorias); $i++){
        if ($categorias[$i] == 'infantil') {
            echo'O nadador ', $nome, ' compete na categoria ', $categorias[$i];
        }
    }
    
}else if($idade >= 13 && $idade < 18){
    for($i = 0; $i < count($categorias); $i++){
        if ($categorias[$i] == 'adolecente') {
            echo'O nadador ', $nome, ' compete na categoria ', $categorias[$i];
        }
    }
}else {
    for($i = 0; $i < count($categorias); $i++){
        if ($categorias[$i] == 'adulto') {
            echo'O nadador ', $nome, ' compete na categoria ', $categorias[$i];
        }
    }
}
?>