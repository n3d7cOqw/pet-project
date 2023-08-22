<div class="createFormContainer">
<form action="" method="POST" enctype="multipart/form-data">
    <div class="formField">Title: <input type="text" class="articleNameInput" name="title" value="<?php echo $result["title"]; ?>"></div>
    <div class="formField">URL: <input type="text" class="urlNameInput" name="url" value="<?php echo $result["url"]; ?>"></div>
    <div class="formField">Min descr: <textarea class="descr_minInput" name="descr_min"><?php if(isset($result["descr_min"])) echo $result["descr_min"]; ?> </textarea></div>
    <div class="formField">Description: <textarea class="descriptionInput" name="description"><?php echo $result["description"]; ?></textarea></div>
    <div class="formField"><select name="cid" class="selectGroup">
        <?php
        $out = "";
        for ($i = 0; $i < count($category); $i++) {
            if ($category[$i]["id"] == $result["cid"]) {
                $out .= "<option value='" . $category[$i]["id"] . "' selected>" .  $category[$i]["title"] . "</option>";
            } else {
                $out .= "<option value='" . $category[$i]["id"] . "'>" .  $category[$i]["title"] . "</option>";
            }
        }
        echo $out;
        ?>
    </select>
    <div class="formField">Photo: <input type="file" class="imageInput" name="image" value="<?php echo $result["image"]; ?>"></div>
    <?php
    if (isset($result["image"]) and $result["image"] != "") {
        echo "<img src='/static/images/" . $result["image"] . "'>";
    }
    ?>
    <input type="submit" class="createSubmit" name="submit" value="<?php echo $action; ?>">
</form>
</div>