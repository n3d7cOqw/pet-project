<?php
    // $message = "qweqwrqrqrqw";
    // $to = "boghdan22bohdan@gmail.com";
    // $from = "bohdan4356@gmail.com";
    // $subject = "Смена пароля";
    // $headers = "From: $from". "\r\n"."Reply-to: $from"."\r\n"."X-Mailer: PHP/". phpversion();
    // if(mail($to, $subject, $message, $headers)){
    //     echo "send";
    // }else{
    //     echo "error";
    // }

    changePassword();
    
    // $query2 = "UPDATE `users` SET `password`='[value-4]' WHERE id =" . $_COOKIE["id"]; 
    // $query = "SELECT password from users where id=" . $_COOKIE["id"];
    
    
?>

<form action="" method="POST" class="change-password-form">
    <div class="form-wrapper">
        <input type="text" name="new-password">
        <div class="tip">new password</div>
        <input type="text" name="old-password">
        <div class="tip">Old password</div>
        <input type="submit">
        <div class = "sent-form"></div>
    </div>
</form>