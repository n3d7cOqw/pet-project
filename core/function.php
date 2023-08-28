<?php
function outAllInfo()
{

    global $result;

    $out = "";
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

        // $out .= '<section class="article">';
        // $out .= '<h1 class="artileTitle">' . $result[$i]['title'] . '</h1>';
        // $out .= '<div class="descr_min"><p>' . $result[$i]['descr_min'] . '</p></div>';
        // $out .= '<div class="articleImage ">';
        // $out .= '<img src="/static/images/' . $result[$i]['image'] . '" class="pure-img-responsive">';
        // $out .= '</div></div>';
        // $out .= '<div><a href="/article/' . $result[$i]['url'] . '" class="readMore">Читать полностью</a></div>';
        // $out .= '</section></div>';
    }
    echo $out;
}

function outInfo()
{
    global $result;
    $out = "<div>";
    $out .= "<h4>" . $result["title"] . "</h4>";
    $out .= "<p>" . $result["descr_min"] . "</p>";
    $out .= "<img src ='/static/images/" . $result['image'] . "'width=200>";
    $out .= "<div><a href='/article/" . $result["url"] . "'>Читать полностью</a></div>";
    $out .= "<p>" . $result["description"] . "</p>";
    $out .= "</div>";
    echo $out;
}
function explodeURL($url)
{
    return explode("/", $url);
}

function getArticle($url)
{
    $query = "SELECT * from info where url='" . $url . "'";
    return select($query)[0];
}
function getCategory($url)
{
    $query = "SELECT * from category where url='" . $url . "'";
    return select($query)[0];
}
function getCategoryList()
{
    $query = "SELECT * FROM `category` ";
    return select($query);
}

function getCategoryArticle($cid)
{
    $query = "SELECT * from info where cid=" . $cid;
    return select($query);
}

function isLoginExist($login)
{
    $query = "SELECT id from users where login ='" . $login . "'";
    $result = select($query);
    if (count($result) === 0) return false;
    return true;
}
function createUser($login, $password, $email)
{
    $password = md5(md5(trim($password)));
    $login = trim($login);
    $email = trim($email);
    $query = "INSERT into users SET login = '" . $login . "', password='" . $password . "', email='" . $email."'";
    return execQuery($query);
}
function login($login, $password)
{
    $password = md5(md5(trim($password)));
    $login = trim($login);
    $query = "SELECT id, login from users where login = '" . $login . "'AND password='" . $password . "'";
    $result = select($query);
    if (count($result) != 0) return $result;
    return false;
}
function generateCode($length = 7)
{
    $chars = "qwertyuiopasdfghjklzxcvbnmQWERTYUIOPASDFGHJKLZXCVBNM1234567890";
    $code = "";
    $clen = strlen($chars) - 1;
    while (strlen($code) < $length) {
        $code .= $chars[mt_rand(0, $clen)];
    }
    return $code;
}
function updateUser($id, $hash, $ip)
{
    if (is_null($ip)) {
        $query = "UPDATE users SET hash='" . $hash . "' WHERE id=" . $id;
    } else {
        $query = "UPDATE users SET hash='" . $hash . "', ip=INET_ATON('" . $ip . "') WHERE id=" . $id;
    }
    return execQuery($query);
}

function getUser()
{
    if (isset($_COOKIE["id"]) and isset($_COOKIE["hash"])) {
        $query = "SELECT id, login, hash, INET_NTOA(ip) as ip FROM users WHERE id = " . intval($_COOKIE["id"]) . " LIMIT 1";
        // echo $query;
        $user = select($query);
        // print_r(count($user));
        if (count($user) === 0) {
            return false;
        } else {
            $user = $user[0];
            if ($user["hash"] !== $_COOKIE["hash"]) {
                clearCookies();
                return false;
            }
            if (!is_null($user["ip"])) {
                if ($user["ip"] !== $_SERVER["REMOTE_ADDR"]) {
                    clearCookies();
                    return false;
                }
            }
            $_GET["login"] = $user["login"];
            return true;
        }
    } else {
        clearCookies();
        return false;
    }
}
function clearCookies()
{
    if(isset($_COOKIE["id"]) && isset($_COOKIE["hash"])){
        setcookie("id", "", time() - 60 * 60 * 24 * 30, "/");
        setcookie("hash", "", time() - 60 * 60 * 24 * 30, "/", null, null, true);
        unset($_GET["login"]);
    }
}



function createArticle($title, $url, $descr_min, $description, $cid, $image, $date)
{
    $query = "INSERT INTO info (title, url, descr_min, description, cid, image, date, authorID) VALUES ('" . $title . "', '" . $url . "', '" . $descr_min . "', '" . $description . "', " . $cid . ", '" . $image . "', '" . $date . "', '".$_COOKIE["id"]."')";
    
    
    return execQuery($query);
    
}

function updateArticle($id, $title, $url, $descr_min, $description, $cid, $image)
{
    $query = "UPDATE info SET title='" . $title . "', url='" . $url . "', descr_min='" . $descr_min . "', description='" . $description . "', cid=" . $cid . ", image='" . $image . "' WHERE id=" . $id;
    return execQuery($query);
}

function logout()
{
    clearCookies();
    header("Location: /");
    exit;
}

function validateForm()
{
    if (
        strlen(trim($_POST["title"])) > 2 && strlen(trim($_POST["title"])) < 50 &&
        strlen(trim($_POST["descr_min"])) > 10 && strlen(trim($_POST["descr_min"])) < 400 &&
        strlen(trim($_POST["url"])) > 3 && strlen(trim($_POST["url"])) < 100 &&
        strlen(trim($_POST["decription"])) < 3000 && substr($_FILES["image"]["type"], 0, 5) == "image" && $_FILES["image"]["size"] < 20 * 1024 * 1024
    ) {
        return true;
    }
    return false;
}

function updateInfo()
{
    $queryUser = "SELECT * FROM users WHERE id =" . $_COOKIE['id'];
    $data = select($queryUser)[0];

    $photo = ($_FILES["photo"]["name"] == null) ? $photo = $data["Photo"] : $photo = $_FILES["photo"]["name"];

    
    $name = ($_POST["name"] == null) ? $name = $data["name"] : $name = $_POST["name"];

    $country = ($_POST["country"] == null) ? $country = $data["country"] : $country = $_POST["country"];

    $bio = ($_POST["bio"] == null) ? $bio = $data["bio"] : $bio = $_POST["bio"];
    
    $query = "UPDATE users SET Photo='" . $photo . "', name='" . $name . "',country='" . $country . "',bio='" . $bio . "' WHERE id =" . $_COOKIE["id"];
    // if (execQuery($query)) echo "Успешно обновлено";
    // else echo "Ошибка";
    if (move_uploaded_file($_FILES["photo"]["tmp_name"], "static/avatars/" . $_FILES["photo"]["name"])) {
    }

    // header("Location: /profile");
}

function outArticleToProfile(){
    $query = "SELECT * FROM `info` WHERE authorID =". $_COOKIE["id"] ;
    $result = select($query);
    $out = "";
    for ($i = 0; $i < count($result); $i++) {
        $out .= '<section class="article">';
        $out .= '<div class="articleImageRow"><img src="/static/images/' . $result[$i]['image'] . '" class="articleImage"> </div>';
        $out .= "<div class='articleInfo'>";
        $out .= "<div class='infoRow'>";
        $out .= '<h1 class="articleTitle">' . $result[$i]['title'] . '</h1>';
        $out .= '<div class="descr_min"><p>' . $result[$i]['descr_min'] . '</p></div>';
        $out .= '<div class="articleDate">Дата публикации: ' . $result[$i]["date"] . '</div>';
        $out .= '<div class="readMore" ><a  href="update/' . $result[$i]['url'] . '">Редактировать</a></div>';
        $out .= "</div></div></section>";
    }
    echo $out;
    echo "</div>";
}

function isOwner($route){
    $query = "SELECT `authorID` FROM `info` WHERE url = '" . $route[1] ."'";
    $result = select($query)[0];
    echo $result['authorID'];
    if($result["authorID"] == $_COOKIE["id"]){
        return true;
    }return false;
}

function createAvatar(){
    $data = "SELECT Photo from users where id=" . $_COOKIE["id"];
    return select($data)[0];
}

function changePassword(){
    if(isset($_POST['new-password'])){
        $query = "SELECT password from users where id=" . $_COOKIE["id"];
        $password = select($query)[0];
        $password = $password["password"];
        $oldPassword = md5(md5(trim($_POST["old-password"])));
        if($oldPassword == $password){
            $query2 = "UPDATE `users` SET `password`='". md5(md5(trim($_POST["new-password"]))) ."' WHERE id =" . $_COOKIE["id"]; 
            if(execQuery($query2)){
                echo "Смена пароля успешна";
            }else{
                echo "Произошла ошибка при смене пароля";
            }
        }
    
        }
}

function changeLogin(){
    if(isset($_POST["new-login"])){
        $query = "SELECT password from users where id=" . $_COOKIE["id"];
        $password = select($query)[0];
        $password = $password["password"];
        if($password == md5(md5(trim($_POST["password"])))){
            $query2 = "UPDATE `users` SET `login`='". $_POST["new-login"] ."' WHERE id =" . $_COOKIE["id"]; 
            if(execQuery($query2)){
                echo "Смена логина успешна";
            }else{
                echo "Произошла ошибка при смене логина";
            }
        }
    }
}

function isAdmin (){
    $query = "SELECT admin from users where id = " . $_COOKIE["id"];
    if(select($query)[0]["admin"] == "true")return true;
    return false;
    
}
function createComment($url, $info){
    $query1 = "SELECT comment from comment where authorId=" . $_COOKIE['id'];
    $comments = select($query1);
    print_r($comments);
    $validate = true;
    echo "423423423423";
    if(count($comments)> 0){
        for($i = 0; $i < count($comments); $i++){
            if($_POST['comment'] == $comments[$i]['comment']){
                $validate = false;
        }
    }
}
    var_dump($validate == true);
    if($validate == true){
        
        $query2 = "INSERT INTO `comment`(`authorID`, `comment`, `login`, `urlArticle`, `photo`) VALUES ('". $_COOKIE['id']. "','" . trim($_POST['comment']) . "','" . $info['login'] . "','" . $url . "','". $info['Photo'] . "')";
        
        execQuery($query2);
    }

}


function outComments($url){
    $query = "SELECT * from comment where urlArticle ='" .$url."'";
    $data = select($query);
    $out = "";
    for($i = 0; $i < count($data); $i++){
        $out .= "<div class='commentBox'>";
        $out .= "<div class='commentInfoOwner'>";
        // $out .= "<div class='commentsOwnerLogin'> <img src='/static/avatas/". $data[$i]['photo']."'> </div>";
        $out .= "<div><img class='commentsOwnerPhoto' src='/static/avatars/" . $data[$i]["photo"] . "'></div>";
        $out .= "<div class='commentsOwnerLogin'>". $data[$i]['login']."</div>";
        $out .= "</div>";
        $out .= "<div class='theComment'><p>". $data[$i]['comment']."</p></div>";
        
        $out .= "</div>";
    }
    echo $out;
}