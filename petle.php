
<?php
require "dane-start.php";

// Pętla for
for ($i = 1; $i <= 10; $i++) {
    echo "Rata $i<br>";
}

// Pętla while
$kwota = 1000;
$miesiac = 0;

while ($kwota > 0) {
    $kwota -= 300;
    $miesiac++;
}

echo "Spłata zajmie $miesiac miesięcy<br>";

// Pętla foreach
foreach ($produkty as $p) {
    echo $p["nazwa"] . "<br>";
}
?>
