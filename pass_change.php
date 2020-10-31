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
        margin-top: 5px;
    }
    h4{
        text-align: center;
        color: #ac2925;
    }

</style>
<?php

if (isset($_GET['email'])){
    $file = fopen("D:\OSPanel\domains\Lab2\user.txt", "r");
    if (!$file){
    echo "ошибка открытия файла";

}
else{
    $text = file('user.txt');
    foreach ($text as $item):
        $str=explode(";", $item);

    $emailUser = $_GET['email'];
    $emailFile = trim($str[2]);
    if ($emailUser==$emailFile){
        ?>

        <script>
            function isRovno(){
                let a = document.getElementById('pass1').value;
                let b =document.getElementById('pass2').value;
                let pass22=document.getElementById('pass22');
                if (a==b){
                    pass22.style.color = "green";
                    pass22.innerHTML= "Пароль правильный "

                }else {
                    pass22.style.color = "red";
                    pass22.innerHTML= "Пароль не правильный "
                }
            }
        </script>
<h1> Введите новый пароль</h1>

        <form method="post" action="pass_change.php" class="form">

            <input type="password" name="pass1"  class="form-control" id="pass1"
                   placeholder="Введите новый пароль"  onkeyup="isRovno()" >
            <br>
            <input type="password" name="pass2"  class="form-control" id="pass2"
                   placeholder="Повторите пароль"  onkeyup="isRovno()" ><br>
            <span id="pass22"></span>
            <input type="hidden" name="email" value="<? echo $emailUser?>">

            <input type="submit" name="fpass" value="Востановления пароль" class="btn btn-primary">
        </form>




        <?php
    }
endforeach;
}
fclose($file);
}
elseif (isset($_POST['pass1'])){
    $file = fopen("D:\OSPanel\domains\Lab2\user.txt", "r+");
    $text = file('user.txt');
    $i = 0;
 //   var_dump($_POST);
    $str1 = $_POST['pass1'];
 //   echo $str1;
    foreach ($text as $item):
        $str=explode(";", $item);

        $emailUser = $_POST['email'];
        $emailFile = trim($str[2]);
        if ($emailUser==$emailFile){
            $text[$i] = $str[0].";".$str1.";".$emailFile.PHP_EOL;

            file_put_contents("D:\OSPanel\domains\Lab2\user.txt", join('',$text));

        }
        $i++;
        endforeach;

        fclose($file);
}
if (isset($_POST['fpass'])){
    ?>
        <form>
            <h4>Вы успешно изменили пароль</h4>
            <a  href="index.php" class="btn btn-primary center-block"> Авторизоваться </a>
        </form>
<?php
}
