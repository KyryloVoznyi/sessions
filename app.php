<?php
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
    <div style="margin:50 auto;width:50%;">
        <?php
        if(isset ($_SESSION['success'])){
            echo('<p style = "color:green">'.$_SESSION['success']."</p>\n");
            unset($_SESSION['success']);
        }

        if(isset($_SESSION['user'])){
            ?>
            <p>Доброго времени суток <?php echo($_SESSION['user']); ?>.</p>
            <p>Чтобы деавторизоваться нажмите <a href="logout.php">сюда</a>.</p>
        <?php } else {?>
            <p>Для работы необходимо авторизоваться, чтобы сделать это нажмите <a href="login.php">сюда</a>.</p>
        <?php } ?>
    </div>
</body>
</html>