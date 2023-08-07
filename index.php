<?php
require_once "config/db.php";
require_once "core/function_db.php";
require_once "core/function.php";
$conn = connect();
error_reporting(E_ERROR | E_PARSE);
if(isset($_GET['route'])){
    $route = $_GET['route'];
}else $route = "";

 // NULL!
$route = explodeURL($route);
switch ($route) {
    case ($route[0] == ""):
        $query = "SELECT * from info";
        $result = select($query);
        if ($result) {
            require_once "templete/main.php";
        } else {
            require_once "templete/404.php";
        }
        break;
    case ($route[0] == "article" and isset($route[1])):
        $url = $route[1];
        $result = getArticle($url);
        if ($result) {
            require_once "templete/article.php";
        } else {
            require_once "templete/404.php";
        }
        break;
    case ($route[0] == "categories"):
        $result = getCategoryList();
        if ($result) {
            require_once "templete/categories.php";
        } else {
            require_once "templete/404.php";
        }
        break;
    case ($route[0] == "cat" and isset($route[1])):
        $url = $route[1];
        $cat = getCategory($url);
        if ($cat) {
            $result = getCategoryArticle($cat["id"]);
            if ($result) {
                require_once "templete/cat.php";
            } else {
                require_once "templete/404.php";
            }
        } else {
            require_once "templete/404.php";
        }
        break;
    case ($route[0] == "register"):
        require_once "templete/register.php";
        break;
    case ($route[0] == "login"):
        require_once "templete/login.php";
        break;
    case ($route[0] == "admin" and $route[1] === "delete" and isset($route[2])):
        if(isAdmin()){
            if (getUser()) {
                $query = "DELETE FROM info where id = " . $route[2];
                execQuery($query);
                header("Location: /admin");
                exit;
            }
        }else header("Loctaion: /");
        header("Location: /");
        break;
    case ($route[0] == "admin" and $route[1] === "create"):
        if(isAdmin()){
            if (getUser()) {
                $query = "SELECT id, title from category";
                $category = select($query);
                require_once "templete/create.php";
            }
        }else header("Loctaion: \ ");
        break;
    case ($route[0] == "admin" and $route[1] === "update" and isset($route[2])):
        if(isAdmin()){
            if (getUser()) {
                $query = "SELECT id, title from category";
                $category = select($query);
                $query = "SELECT * FROM info where id=" . $route[2];
                $result = select($query)[0];
                require_once "templete/update.php";
            }
        }else header("Loctaion: /");
        break;
    case ($route[0] == "admin"):
        if(isAdmin()){        
            $query = "SELECT * from info";
            $result = select($query);
            if ($result) {
                require_once "templete/admin.php";
            }
        }else header("Loctaion: /");
        break;
    case ($route[0] == "logout"):
        require_once "templete/logout.php";
        break;
    case ($route[0] == "profile"):
        require_once "templete/profile.php";
        break;
    case ($route[0] == "script.js"):
        require_once "core/script.js";
        break;
    case ($route[0] === "update" and isset($route[1])):
        
        if (getUser()) {
                if(isOwner($route)){
                    $query = "SELECT id, title from category";
                    $category = select($query);
                    $query = "SELECT * FROM info where url='" . $route[1]. "'";
                    $result = select($query)[0];
                    require_once "templete/update.php";
                }
                else{
                    header("Location: /");
                }
            }
        break;
    case ($route[0] === "create"):
        if (getUser()) {
            $query = "SELECT id, title from category";
            $category = select($query);
            require_once "templete/create.php";
        }
        break;
    case ($route[0] === "change_password"):
        if (getUser()) {
            require_once "templete/change_password.php";
        }
        break;
    case ($route[0] === "change_login"):
        if (getUser()) {
            require_once "templete/change_login.php";
        }
        break;
    default:
        require_once "templete/404.php";
}
