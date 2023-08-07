<?php
if(isset($_COOKIE["id"])){
$avatar = createAvatar();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../static/css/style.css">
    <title>Document</title>
</head>

<body>
    <div class="body">
        <header>
            <div class="header">
                <!-- <div class="container"> -->
                    <div class="headerRow">
                        <div class="main">
                            <div class="btn">
                                <a href="/">Главная</a>
                            </div>
                        </div>
                        <div class="buttons">
                            <div class="cat btn">
                                <a href="/categories">Категории</a>
                            </div>
                            <?php
                            if (getUser()) {
                                echo "<img class='miniAvatar' src='static/avatars/" . $avatar["Photo"] . "'>";
                                echo "<div class='profile btn'><a href='/profile'>Профиль</a></div>"; 
                               
                                echo "<div class='logout btn'><a href='/logout'>Выйти из аккаунта</a></div>";
                            } else {

                                echo '
                            <div class="reg btn">
                                <a href="/register">Регистрация</a>
                            </div>
                            <div class="login btn">
                                <a href="/login">Войти в аккаунт</a>
                            </div>';
                            }
                            ?>
                            <div class="newArticle">
                                <a href="/create" class="createArticle btn"> Новая статья</a>
                            </div>
                        </div>
                    </div>
                <!-- </div> -->
            </div>
        </header>

</body>
</html>