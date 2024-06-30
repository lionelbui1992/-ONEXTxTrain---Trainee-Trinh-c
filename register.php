<?php
    session_start();

    if(isset($_SESSION["status"])) {
        echo "<h3>" . $_SESSION['status'] . "</h3>";
        unset($_SESSION["status"]);
    }
?>
<h1>Register form</h1>
<form action="main.php" method="post">
    Email: 
    <input type="text" name="email">
    Password:
    <input type="text" name="password">
    <button type="submit" name="btn_register">Register</button>
</form>