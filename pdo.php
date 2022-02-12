<?php
$pdo=new PDO('mysql:host=localhost;port=3306;dbname=sessions','root','');
//В случае ошибок будет описание
$pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
?>