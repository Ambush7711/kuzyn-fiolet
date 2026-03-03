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

?>
