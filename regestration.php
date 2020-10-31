<link href="CSS/bootstrap.css" rel="stylesheet">
<style>
    form{
        padding: 10px;
        background: lightblue;
        width: 400px;
        margin: 10px auto;
        border-radius: 5px;
    }

    form input{
        margin: 5px;
    }
    h4{
        margin-top: 3px;
        margin-bottom: 1px;
        text-align: center;
        color: black;
    }


</style>

<script>
    function isRovno(){
        var a = document.getElementById('pass1').value;
        var b =document.getElementById('pass2').value;
        var pass22=document.getElementById('pass22');
        if (a==b){
            pass22.style.color = "green";
            pass22.innerHTML= "Пароль правильный "

        }else {
            pass22.style.color = "red";
            pass22.innerHTML= "Пароль не правильный "
        }
    }
</script>


<form method="post" action="">
    <?
    if(isset($_GET['msg'])){
        echo $_GET['msg'];
    }

    ?>
<h4>Login</h4><br>
    <input type="text" name="login" required placeholder="Login" class="form-control" pattern="/^[a-z0-9_-]{3.16}$">
<h4>Password</h4><br>
    <input type="password" name="pass1" required placeholder="Password" class="form-control"id="pass1"
           onkeyup="isRovno()">
<h4> Password2</h4><br>
    <input type="password" name="pass2" required placeholder="Password2" class="form-control" id="pass2"
           onkeyup="isRovno()">
<h4> email</h4><br>
    <input type="text" name="email" placeholder="email" required class="form-control" pattern="\w+@\w+\.\w{2,6}">
    <span id="pass22"></span>
    <input type="submit" name="save" class="btn btn-primary" value="Зарегестрироваться"></form>

<?php
if(isset($_POST['save'])){
$file = fopen("D:\OSPanel\domains\Lab2\user.txt", "a+");
$text = file('user.txt');

$loginUser = $_POST['login'];
$passUser = $_POST['pass1'];
$emailUser = $_POST['email'];
$i = 0;
foreach ($text as $item):

    $str=explode(";", $item);
    $loginFile = trim($str[0]);
    $emailFile = trim($str[2]);

    if ($loginFile != $loginUser && $emailUser != $emailFile)
    {
      $i++;
    }
    else{
        ?>
<script>
    location="regestration.php?msg=Login or email already exists";
</script>

<?php    }

endforeach;
    if($i==sizeof($text)) {
        $s = $loginUser . ";" . $passUser . ";" . $emailUser.PHP_EOL;

        file_put_contents("D:\OSPanel\domains\Lab2\user.txt", $s, FILE_APPEND);


   //echo "addd";
    }
fclose($file);
}
if (isset($_POST['save'])){
    ?>
    <form>
        <p>Вы успешно зарегестрировались. нажмите на кнопку для автроризации </p>
        <a href="index.php" class="btn btn-primary center-block">Авторизоваться </a>

    </form>
    <?php
}
?>