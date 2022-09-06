<?php
if(isset($_POST['submit']))
{
$amount = $_POST['figure01'];
$convertfrom = $_POST['convertfrom'];
$convertinto = $_POST['convertinto'];

$nairatoDollar = 428.08;
$dollartoNaira = 0.0023;
$eurotoDollar = 0.99;
$dollartoEuro = 1.01;
$eurotoNaira = 0.0023;
$nairatoEuro = 433.83;

$convertNtoD = $amount * $nairatoDollar;
$convertDtoN = $amount * $dollartoNaira;
$convertDtoE = $amount * $dollartoEuro;
$convertEtoD = $amount * $eurotoDollar;
$convertEtoN = $amount * $eurotoNaira;
$convertNtoE = $amount * $nairatoEuro;

if($convertfrom == "usd" && $convertinto == "euro"){
    echo "$amount USD is $convertEtoD Euro";
}
else if($convertfrom == "usd" && $convertinto == "naira"){
    echo "$amount USD is $convertNtoD Naira";
}
else if($convertfrom == "naira" && $convertinto == "usd"){
    echo "$amount Naira is $convertDtoN USD";
}
else if($convertfrom == "naira" && $convertinto == "euro"){
    echo "$amount Naira is $convertEtoN Euro";
}
else if($convertfrom == "euro" && $convertinto == "usd"){
    echo "$amount Euro is $convertDtoE USD";
}
else if($convertfrom == "euro" && $convertinto == "naira"){
    echo "$amount Euro is $convertNtoE Naira";
}
else{
    echo "Please select a valid/different currency";
}
  
}
