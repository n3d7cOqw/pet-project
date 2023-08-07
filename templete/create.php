<?php

$action = "Create";
if (isset($_POST["submit"]) && validateForm()) {
    $title = strip_tags(trim($_POST["title"]));
    $url = strip_tags(trim($_POST["url"]));
    $descr_min = strip_tags(trim($_POST["descr_min"]));
    $description = strip_tags(trim($_POST["description"]));
    $cid = strip_tags(($_POST["cid"]));
    $date =  date("Y-m-d", time());
    if (substr($_FILES["image"]["type"], 0, 5) == "image" && $_FILES["image"]["size"] < 20 * 1024 * 1024) {
        move_uploaded_file($_FILES["image"]["tmp_name"], "static/images/" . $_FILES["image"]["name"]);
        $image = $_FILES["image"]["name"];
        $create = createArticle($title, $url, $descr_min, $description, $cid, $image, $date);
        if ($create) {
            header("Location: /");
        } else {
            setcookie("alert", "create error", time() + 60 * 10);
        }
        if (isset($_COOKIE["alert"])) {
            $alert = $_COOKIE["alert"];
            setcookie("alert" . "", time() - 60 * 10);
            unset($_COOKIE["alert"]);
            echo $alert;
        }
    } else {
        echo "<div class='error'>Файл весит больше 20 мб</div>";
    }
} else {
    $result = array(
        "title" => "",
        "url" => "",
        "deskr_min" => "",
        "description" => "",
        "cid" => "",
        "image" => "",
        "date" => ""
    );
}
?>

<h1>Create</h1>
<?php
require_once "_form.php";
?>