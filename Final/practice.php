<?php

//Print korar way-
echo "<h1>Hello World</h1>";
print('Hello PHP');


/*//Variable
$name = "Lesnar";
$cgpa = 2.5;
$id = 1;
$mail = "lesnar@gmail.com";*/

//echo "<br><br>";

/*//Multiple value print
$arr = [1, "lesnar", 2.5];
echo $arr[0]." ".$arr[1]." ". $arr[2];
echo "<br>";

foreach($arr as $values)
{
    echo $values." ";
}
echo "<br>";*/

/*//Value type janar jonno
$std = [1, "test", 2.5, true, null, 'r'];
var_dump($std);*/

/*//User Input
$username = $_POST['username'];
$mail = $_POST['mail'];

echo "Name: " . $username . "<br>";
echo "Email: ". $mail;*/

/*echo "Enter your name: ";
$name = readline();
echo "<br>";
echo "Hello" . $name;*/

echo "<br><br>";

//$std = [1, "lesnar", 2.5];
//$std = array(1, "lesnar", 2.5);

//2D array
$std = [
    [1, "X", 1.5],
    [2, "Y", 2.5],
    [3, "Z", 3.5]
];
echo $std[2][2];

print("<br>");

//Array index name
$stds = ['id' => 1, 'name' => "XYZ", 'cgpa' => 3.5];
echo $stds['name'];

echo "<br>";
//Array Index name in 2D array
$stds2D = [
    's1' => ['id' => 1, 'name' => "X", 'cgpa' => 1.5],
    's2' => ['id' => 2, 'name' => "Y", 'cgpa' => 2.5],
    's3' => ['id' => 3, 'name' => "Z", 'cgpa' => 3.5]
];

echo $stds2D['s3']['name'];

echo"<br><br>";

foreach($stds2D as $arr){
    foreach($arr as $arr2){
        echo $arr2." ";
    }
    echo "<br>";
}

?>

<?php
/*if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    echo "Hello " . $name;
}*/
?>

<!--<form method="POST">
    <label>Enter your name: </label>
    <input type="text" name="name" required>
    <button type="submit">Submit</button>
</form>
-->




