<?php
session_start();
unset ($_SESSION['user']);
$_SESSION['success']='Вы деавторизовались!';
header("Location:app.php");
return;
?>