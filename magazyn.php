
<?php
require "dane-start.php";

$suma = 0;
$brakuje = 0;
$najdrozszy = null;
$najtanszy = null;

$podzespoly = 0;
$peryferia = 0;
$akcesoria = 0;

$szukane = $_GET["szukaj"] ?? "";
$znaleziony = null;

echo "<h2>Magazyn produktów</h2>";

echo "<form method='get'>";
echo "<input type='text' name='szukaj' placeholder='Nazwa produktu'>";
echo "<button type='submit'>Szukaj</button>";
echo "</form>";

echo "<table border='1' cellpadding='8'>";
echo "<tr>
<th>Nazwa</th>
<th>Kategoria</th>
<th>Cena</th>
<th>Ilość</th>
<th>Status</th>
<th>Ikona</th>
</tr>";

foreach ($produkty as $p) {

    // Obliczanie wartości magazynu
    $suma += $p["cena"] * $p["ilosc"];

    // Liczenie niedostępnych produktów
    if ($p["ilosc"] === 0) {
        $brakuje++;
    }

    // Wyszukiwanie najdroższego produktu
    if ($najdrozszy === null || $p["cena"] > $najdrozszy["cena"]) {
        $najdrozszy = $p;
    }

    // Wyszukiwanie najtańszego dostępnego produktu
    if ($p["ilosc"] > 0 && ($najtanszy === null || $p["cena"] < $najtanszy["cena"])) {
        $najtanszy = $p;
    }

    // Liczenie produktów w kategoriach
    if ($p["kategoria"] === "Podzespoly") {
        $podzespoly++;
    } elseif ($p["kategoria"] === "Peryferia") {
        $peryferia++;
    } elseif ($p["kategoria"] === "Akcesoria") {
        $akcesoria++;
    }

    // Wyszukiwanie produktu po nazwie
    if ($szukane !== "" && stripos($p["nazwa"], $szukane) !== false) {
        $znaleziony = $p;
    }

    // Określanie statusu produktu
    $status = match (true) {
        $p["ilosc"] === 0 => "Brak",
        $p["ilosc"] < 5 => "Ostatnie sztuki",
        default => "Dostępny"
    };

    // Ikona kategorii
    $ikona = match ($p["kategoria"]) {
        "Podzespoly" => "🖥️",
        "Peryferia" => "⌨️",
        "Akcesoria" => "🔌",
        default => "📦"
    };

    echo "<tr>";
    echo "<td>" . htmlspecialchars($p["nazwa"]) . "</td>";
    echo "<td>" . htmlspecialchars($p["kategoria"]) . "</td>";
    echo "<td>" . number_format($p["cena"], 2, ',', ' ') . " zł</td>";
    echo "<td>" . $p["ilosc"] . "</td>";
    echo "<td>$status</td>";
    echo "<td>$ikona</td>";
    echo "</tr>";
}

echo "</table>";

echo "<h3>Podsumowanie magazynu</h3>";

echo "Łączna wartość: " . number_format($suma, 2, ',', ' ') . " zł<br>";
echo "Produkty niedostępne: $brakuje<br>";
echo "Najdroższy produkt: " . $najdrozszy["nazwa"] . " - " . number_format($najdrozszy["cena"], 2, ',', ' ') . " zł<br>";

echo "<h3>Najtańszy dostępny produkt</h3>";

echo $najtanszy["nazwa"] . " - " . number_format($najtanszy["cena"], 2, ',', ' ') . " zł";

echo "<h3>Liczba produktów w kategoriach</h3>";
echo "Podzespoły: $podzespoly<br>";
echo "Peryferia: $peryferia<br>";
echo "Akcesoria: $akcesoria<br>";

if ($szukane !== "") {
    echo "<h3>Wynik wyszukiwania</h3>";

    if ($znaleziony === null) {
        echo "Nie znaleziono produktu";
    } else {
        echo "Znaleziono: " . htmlspecialchars($znaleziony["nazwa"]);
    }
}
?>
