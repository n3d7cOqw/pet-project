<?php
require_once "header.php";

// print_r($result);
$out = "<div class='container'>";
$out .= "<div class='item'>";
$out .= '<h1 class="itemTitle">' . $result['title'] . '</h1>';
$out .= '<div class="itemDescr_min"><p>' . $result['descr_min'] . '</p></div>';
$out .= '<div class="itemImageRow"><img src="/static/images/' . $result['image'] . '" class="itemImage"> </div>';
$out .= "<div class='itemDescription'><p>" . $result["description"] . "</p></div>";
$out .= "</div>";

// echo  "</div>";
echo $out;
$query = "SELECT login, Photo from users WHERE id = " . $_COOKIE["id"];
$info = select($query)[0];
if(strlen($_POST["comment"]) != 0){
    
    createComment($route[1], $info);
}
?>
<div class="commentsContainer">
    <div class="commentForm">
        <form action="" method="post">
            <div class="contentComment">
                <?php
                echo "<div class='avatarComment'><img src='project/static/avatars/".$info["Photo"]."'></div>";
                echo "<div class='loginComment'>". $info["login"]."</div>";
                ?>
                <div class="author">

                </div>
                <textarea name="comment" class="commentTextArea">
                </textarea>
                <div class="sentComment">
                    <input type="submit">
                </div>
            </div>
        </form>
    </div>
        <div class="comments">
        <?php
        outComments($route[1]);
        ?>
        </div>
</div>
</div>