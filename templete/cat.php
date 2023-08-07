
<?php

// category page

require "header.php";
echo "<div class='container'>";

$out = "";
$out .= "<div>";
$out .= "<h4 class='titleOfCat'> Категория: " . $cat["title"] . "</h4>";
// $out .= "<p>" . $cat["description"] . "</p>";
$out .= "</div>";
echo $out;
outAllInfo();
echo "</div>";
