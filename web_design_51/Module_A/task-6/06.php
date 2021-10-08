<?php
    session_start();

    if(isset($_POST['submit'])){
        if($_POST['captcha'] === $_SESSION['captcha']){
            echo '<p class="success">成功</p>';
        }else{
            echo '<p class="fail">失敗</p>';
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        .success{
            font-size: 48px;
            font-weight: bold;
            color: #008800;
        }
        .fail{
            font-size: 48px;
            font-weight: bold;
            color: #880000;
        }
    </style>
</head>
<body>
    <form action="" method="post">
        <img src="06-captcha.php" alt="">
        <input type="text" name="captcha" id="">
        <button type="submit" name="submit">submit</button>
    </form>
</body>
</html>
