<?php
session_start();
unset($_SESSION["id"]);
unset($_SESSION["username"]);
session_destroy();

header("Location: signin.php");
exit();

?>