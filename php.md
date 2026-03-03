<?php
$a = 2;
$b = 1.2;

echo $b*$a;
echo "</br>";
echo $b+$a;
echo "</br>";
echo $b-$a;
echo "</br>";
echo $b/$a;
echo "</br>";

if ($b>$a){
echo "Prawdą jest że $b większy od $a";
}elseif ($b==$a){
echo "Prawdą jest że $b równy $a";
}else {
echo "prawdą jest że $b mniejszy od $a";
}





$tab = [1,2,3,4,5,6, "XD"];

echo $tab[6];

$tab_assoc = [
    "key" => "value",
    "key" => "value"
];
echo "</br>";
echo "Tablica Asocjacyjna <br>";
echo $tab_assoc["key"];

echo "</br><hr></br>";

echo "<pre>";
print_r($tab);
print_r($tab_assoc);
echo "<pre>";


?>
