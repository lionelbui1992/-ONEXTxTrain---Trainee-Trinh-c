<?php
    session_start();

    if(isset($_SESSION["status"])) {
        echo "<h3>" . $_SESSION['status'] . "</h3>";
        unset($_SESSION["status"]);
    }
?>
<h1>Reset Password</h1>
<form action="passwordResetCode.php" method="post">
    Email: 
    <input type="text" name="email">
    <button type="submit" name="password-reset-btn">send password</button>
</form>