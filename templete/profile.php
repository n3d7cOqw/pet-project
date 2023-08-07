
<?php
require_once "templete/header.php";
$query = "SELECT * FROM `users` WHERE id ='" . $_COOKIE["id"] . "'";
$result = select($query)[0];
// print_r($_POST);
updateInfo();

?>


<div class="container">
    <form method="POST" enctype="multipart/form-data">
        <div class="infoProfile">

            <div class="photoProfile"><?php echo "<img class='avatar' src='static/avatars/" . $result["Photo"] . "'>" ?></div>
            <div class="info">
                <h1>Ваш профиль</h1>
                <div class="nameContainer">

                    <p>Имя: <?php echo $result['name']   ?></p>
                </div>
                <div class="countryContainer">
                    <p>Страна:<?php echo $result['country']   ?> </p>
                </div>
                <div class="bioContainer">
                    <p>Био: <?php echo $result['bio']   ?></p>
                </div>
                <div class="editInfo">
                    <p>Редактировать</p>
                </div>
            </div>
        </div>
    </form>
    <div class="settings">
        <div class="anotherSetting">
            <button>Другие настройки</button>
            <!-- <div class="modal">
                <div class="modalWindow">
                    <button>Смена логина</button>
                    <button>Смена пароля</button>
                    <button class="btnClose">X</button>
                </div>
                <div class="overlay"></div>
            </div> -->
        </div>
    </div>
    <div class="yourArticles">
        <h1>Ваши статьи</h1>
    </div>
    <?php outArticleToProfile();?>
</div>
<script src="core/script.js"></script>