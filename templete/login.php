<?php

require "header.php";

if (isset($_POST['submit'])) {
    $user = login($_POST["login"], $_POST["password"]);
    if ($user) {
        $user = $user[0];
        $hash = md5(generateCode(10));
        $ip = null;
        if (!empty($_POST["ip"])) {
            $ip = $_SERVER["REMOTE_ADDR"];
        }
        updateUser($user["id"], $hash, $ip);
        setcookie("id", $user["id"], time() + 60 * 60 * 24 * 30, "/");
        setcookie("hash", $hash, time() + 60 * 60 * 24 * 30, "/");
        header("Location: \ ");
        exit();
    }
    if ($_POST != array()) {
        echo "Вы ввели неправильный пароль или логин";
    }
}
?>
<!-- <h2>Логин</h2>
<form method="POST">
    Login: <input type="text" name="login" required><br>
    Password <input type="text" name="password" required><br>
    Прикреплять к IP: <input type="checkbox" name="ip"><br>
    <input type="submit" name="submit" value="Войти">
</form> -->

<div class="formRow">
    <form method="POST" class="form">
        <h2 class="formTitle">Логин</h2>
        <div class="formGroup">
            <input type="text" name="login" required class="formInput" placeholder=" ">
            <label class="formLabel">Логин</label>
        </div>

        <div class="formGroup">
            <input type="text" name="password" required class="formInput" placeholder=" ">
            <label class="formLabel">Пароль</label>
        </div>
        <div class="checkBox">Прикреплять к IP: <input type="checkbox" name="ip"></div>
        <input type="submit" name="submit" value="Логин" class="formBTN">
    </form>

</div>