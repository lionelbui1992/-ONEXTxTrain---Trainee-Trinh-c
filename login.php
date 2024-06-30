<?php
    session_start();

    if(isset($_SESSION["authenticated"])) {
        $_SESSION["status"] = "your already login";
        header("Location: index.php");
        exit(0);
    }

    if(isset($_SESSION["status"])) {
        echo "<h3>" . $_SESSION['status'] . "</h3>";
        unset($_SESSION["status"]);
    }
?>
<h1>Login form</h1>
<form action="handleLogin.php" method="post">
    Email: 
    <input type="text" name="email">
    Password:
    <input type="text" name="password">
    <button type="submit" name="btn_login">Login</button>
    <p>Did get the email?<a href="resendEmail.php">Resend here</a></p>
    <a href="passwordReset.php">Forgot your password</a>
</form>