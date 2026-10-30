
<?php
const VAT = 0.23;

$nazwa = "Mysz Razer";
$netto = 199.00;
$ilosc = 15;

// Cena brutto za sztukę
$brutto = $netto * (1 + VAT);

// Wartość brutto zamówienia
$wartosc = $brutto * $ilosc;

// Rabat procentowy
$rabat = 10;
$wartoscPoRabacie = $wartosc * (1 - $rabat / 100);

// Rata przy 10 ratach
$rata = round($wartoscPoRabacie / 10, 2);

// Zamiana napisu na liczbę
$cenaNapis = "899,00";
$cenaNapis = str_replace(',', '.', $cenaNapis);

if (is_numeric($cenaNapis)) {
    $cenaNapis = (float)$cenaNapis;
}

echo "<h2>Cennik produktu</h2>";

echo "<table border='1' cellpadding='8'>";
echo "<tr><th>Nazwa</th><th>Netto</th><th>Brutto</th><th>Ilość</th><th>Wartość</th></tr>";

echo "<tr>";
echo "<td>$nazwa</td>";
echo "<td>" . number_format($netto, 2, ',', ' ') . " zł</td>";
echo "<td>" . number_format($brutto, 2, ',', ' ') . " zł</td>";
echo "<td>$ilosc</td>";
echo "<td>" . number_format($wartosc, 2, ',', ' ') . " zł</td>";
echo "</tr>";

echo "</table>";

echo "<p>Wartość po rabacie: " . number_format($wartoscPoRabacie, 2, ',', ' ') . " zł</p>";
echo "<p>Rata: " . number_format($rata, 2, ',', ' ') . " zł</p>";
echo "<p>Cena z napisu: " . number_format($cenaNapis, 2, ',', ' ') . " zł</p>";
?>
