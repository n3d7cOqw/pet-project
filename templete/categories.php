
<?php
require "header.php";

echo "<pre>";
$out = "";
echo "<div class='container'>";
echo '<h1 class="categories">Категории</h1>';
for ($i = 0; $i < count($result); $i++) {
    $out .= "<div class='category'>";
    $out .= "<div class='catTitle'>" . $result[$i]["title"] . "</div>";
    $out .= "<div class='catDescription'>" . $result[$i]["description"] . "</div>";
    $out .= "<div class='goToCategory'><a href='cat/" . $result[$i]["url"] . "'>Подробнее</a></div>";
    $out .= "</div>";
}
echo $out;
echo "</div>";
