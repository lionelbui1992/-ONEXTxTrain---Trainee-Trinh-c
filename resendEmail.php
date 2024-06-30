<?php 
    session_start();

    if(isset($_SESSION["status"])) {
        echo "<h3>" . $_SESSION['status'] . "</h3>";
        unset($_SESSION["status"]);
    }
?>
<h1>Resend Email Form</h1>
<form action="resendCode.php" method="post">
    Email:
    <input type="text" name="email">
    <button type="submit" name="btn-resend">Send</button>
</form>