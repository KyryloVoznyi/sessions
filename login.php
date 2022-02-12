<?php
require_once "pdo.php";
session_start();
?>

<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <div style="margin:50 auto;width:500px">
    <?php
    if (isset($_SESSION['user'])) {
        unset($_SESSION['user']);
        header('Location:app.php');
        return;
    } elseif(isset($_POST['login'])&&isset($_POST['password'])) {
        $sql= "SELECT * FROM `users` WHERE login = :login AND password = :password";
        $stmt = $pdo->prepare($sql);
        $stmt->execute(array(
            ':login'=> $_POST['login'],
            ':password'=> $_POST['password']
        ));
        $count = $stmt -> rowCount();
        if($count!=0){
            while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
                $dbuser=$row['login'];
                $dbpass=$row['password'];
            }
            if($_POST['login']==$dbuser && $_POST['password']==$dbpass){
                $_SESSION['user']=$dbuser;
                header('Location:app.php');
                return;
            }else{
                $_SESSION['success']="Неверный логин или пароль";
                header('Location:app.php');
                return;
            }
        }else{
            $_SESSION['success']="Такого пользователя не существует";
            header('Location:app.php');
            return;
        }
    }
    ?>
        <form action="" method="post">
            <p>Логин: <input type="text" name="login"></p>
            <p>Пароль: <input type="password" name="password"></p>
            <p><input type="submit"></p>
        </form>
    </div>
</body>

</html>