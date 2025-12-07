<?php

//1
echo "<h4>Problem practice 1 --></h4>";
$length = 2;
$width = 3;
$rectangle = $length * $width;
$perimeter = 2 * ($length + $width);

echo "Rectangle: ". $rectangle. "<br>" ."Perimeter: ".$perimeter;

//2
echo "<br><br>";
echo "<h4>Problem practice 2 --></h4>";
$num = 100;
echo "Amount: ". $num ."<br>";
$vat = $num * 0.15;
echo "VAT amount: ". $vat ."<br>";
$total = $num + $vat;
echo "Total amount after adding the VAT: ".$total;

//3
echo "<br><br>";
echo "<h4>Problem practice 3 --></h4>";
$value = 4;
if($value % 2 == 0){
    echo $value." is a Even number"."<br>";
}
else{
    echo $value." is a Odd number"."<br>";
}

//4
echo "<br><br>";
echo "<h4>Problem practice 4 --></h4>";
$num1 = 25;
$num2 = 50;
$num3 = 30;

if($num1 >= $num2 && $num1 >= $num3){
    echo $num1." is the largest number";
}
else if($num2 >= $num1 && $num2 >= $num3){
    echo $num2." is the largest number";
}
else{
    echo $num3." is the largest number";
}

//5
echo "<br><br>";
echo "<h4>Problem practice 5 --></h4>";
for($i = 10; $i <= 100; $i++){
    if($i % 2 != 0){
        echo $i." ";
    }
}

//6
echo "<br><br>";
echo "<h4>Problem practice 6 --></h4>";
$arr = [1, 2, 3, 4, 5, 6];
$findNumber = 5;
$found = false;

/*for($i = 0; $i < count($arr); $i++){
    if($arr[$i] == $findNumber){
        echo $findNumber. " found in index ". $i."<br>";
        $found = true;
        break;
    }
}
*/

foreach($arr as $std){
    if($std == $findNumber){
        echo $findNumber. " found number in the array!";
        $found = true;
        break;
    }
}

if(!$found){
    echo $findNumber." is not in the array!";
}

//7
echo "<br><br>";
echo "<h4>Problem practice 7 --></h4>";

for($i = 1; $i <= 3; $i++){
    for($j = 1; $j <= $i; $j++){
        echo "* ";
    }
    echo "<br>";
}

echo "<br>";

for($i = 3; $i >= 1; $i--){
    for($j = 1; $j <= $i; $j++){
        echo $j;
    }
    echo "<br>";
}

echo "<br>";

$word = 'A';
for($i = 1; $i <= 3; $i++){
    for($j = 1; $j <= $i; $j++){
        echo $word." ";
        $word++;
    }
    echo "<br>";
}

echo "<br><br>";
echo "<h4>Problem practice 8 --></h4>";

?>