<?php
require_once "header.php";
if (!getUser()) {
    header("Location: /login");
}
?>

<h1>Admin panel</h1>
<div><a href="/admin/create">Create</a></div>
<div><a href="/logout">Logout</a></div>
<?php
$out = "";
for ($i = 0; $i < count($result); $i++) {
    $out .= "<p>" . $result[$i]["title"] . "</p>";
    $out .= "<img src ='/static/images/" . $result[$i]['image'] . "'width=50>";
    $out .= "<div><a href='/admin/delete/" . $result[$i]["id"] . "' onclick='return confirm(\"Точно??\")'> Удалить</a></div>";
    $out .= "<div><a href='/admin/update/" . $result[$i]["id"] . "' onclick='return confirm(\"Точно??\")'> Обновить</a></div>";
    $out .= "</div>";
}
echo $out;
?>