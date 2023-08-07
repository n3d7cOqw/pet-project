<?php
// main templete

require "header.php";
$out = "";

$out .= "<div class='container'>";
for ($i = 0; $i < count($result); $i++) {
    $out .= '<section class="article">';
    $out .= '<div class="articleImageRow"><img src="/static/images/' . $result[$i]['image'] . '" class="articleImage"> </div>';
    $out .= "<div class='articleInfo'>";
    $out .= "<div class='infoRow'>";
    $out .= '<h1 class="articleTitle">' . $result[$i]['title'] . '</h1>';
    $out .= '<div class="descr_min"><p>' . $result[$i]['descr_min'] . '</p></div>';
    $out .= '<div class="articleDate">Дата публикации: ' . $result[$i]["date"] . '</div>';
    $out .= '<div class="readMore" ><a  href="/article/' . $result[$i]['url'] . '">Читать полностью</a></div>';
    $out .= "</div></div></section>";
}
echo $out;
echo "</div>";
echo "</div>";
// outAllInfo();
