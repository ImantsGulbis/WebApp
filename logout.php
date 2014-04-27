<?php
session_start();
unset($_Session['myusername']);
unset($_Session['mypassword']);
session_destroy();
header("location:index.php");
?>