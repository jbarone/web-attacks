<?php
unset($_COOKIE['uid']);
setcookie("uid", null);
header('location: index.php');
exit;
?>
