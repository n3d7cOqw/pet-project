<?php
require "header.php";
if (isset($_POST['submit'])) {
    $err = [];
    echo (strlen($_POST["password"]) < 4 or strlen($_POST["password"] > 30));
    if (strlen($_POST["login"]) < 4 or strlen($_POST["login"]) > 30) {
        $err[] = "Логин меньше 4 или больше 30";
    }
    // if (strlen($_POST["password"]) < 4 or strlen($_POST["password"] > 30)) {
    //     $err[] = "Пароль меньше 4 или больше 30";
    // }
    if (isLoginExist($_POST["login"])) {
        $err[] = "Логин существует";
    }
    if (count($err) == 0) {
        createUser($_POST["login"], $_POST["password"], $_POST["email"]);
        header("Location: /login");
        exit();
    } else {
        echo "<h4>Ошибка при регистрации</h4>";
        foreach ($err as $error) {
            echo $error, "<br>";
        }
    }
}
?>
<div class="formRow">
    <form method="POST" class="form">
        <h2 class="formTitle">Регистрация</h2>

        <div class="formGroup">
            <input type="email" name="email" required class="formInput" placeholder=" ">
            <label class="formLabel">Почта</label>
        </div>

        <div class="formGroup">
            <input type="text" name="login" required class="formInput" placeholder=" ">
            <label class="formLabel">Логин</label>
        </div>

        <div class="formGroup">
            <input type="password" name="password" required class="formInput" placeholder=" ">
            <label class="formLabel">Пароль</label>
        </div>

        <input type="submit" name="submit" value="Регистрация" class="formBTN">
    </form>

</div>