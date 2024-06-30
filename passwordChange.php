<?php
    session_start();

    if(isset($_SESSION["status"])) {
        echo "<h3>" . $_SESSION['status'] . "</h3>";
        unset($_SESSION["status"]);
    }
?>
<h1>Change password</h1>
<form action="passwordResetCode.php" method="post"> 
    <input type="hidden" name="password_token" value="<?php if(isset($_GET["token"])) { echo $_GET["token"]; }?>">
    <br><br>
    email:
    <input type="text" name="email" value="<?php if(isset($_GET["email"])) { echo $_GET["email"]; }?>"> 
    new password:
    <input type="text" name="new_password">
    confirm password:
    <input type="text" name="confirm_password">
    <button type="submit" name="password_update">Update password</button>
</form>