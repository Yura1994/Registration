<link href="CSS/bootstrap.css" rel="stylesheet">
<?php
?>

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
    input, a{
        margin: 5px  ;
    }
</style>

<form method="post" action="">
    <?
    if(isset($_GET['msg'])){
        echo $_GET['msg'];
    }

    ?>
    <input type="text" name="login" required placeholder="Login" class="form-control">
    <input type="password" name="pass" required placeholder="Password" class="form-control">
    <input type="submit" name="avt" class="btn btn-primary" value="Авторизоваться">
    <a href="fpass.php"> Забыли пароль </a>
    <a  href="regestration.php" class="btn btn-primary"> Регестрация </a>
</form>

<?php
if (isset($_POST['avt']) )
{
    $file = fopen("D:\OSPanel\domains\Lab2\user.txt", "r");
    $text = file('user.txt');
    $i = 0;
    $loginUser = $_POST['login'];
    $passUser = $_POST['pass'];
   // var_dump($_POST);
    //var_dump($text);
    //exit();
    foreach ($text as $item):
        //var_dump($item);


        $str = explode(";", $item);
        $loginFile = trim($str[0]);
        $passFile = trim($str[1]);

        if ($loginUser == $loginFile)
        {


if($passFile== $passUser){
    $i++;
    echo $i;

    ?>
    <script>
        location="admin.php";
    </script>
        <?php
}
else{
    ?>
                <script>
                    location="index.php?msg= Password already exists";
                </script>
            <?php
}
        }
    endforeach;
    fclose($file);

    ?>
    <script>
        location="index.php?msg=Login or password already exists";
    </script>
    <?php
}
?>
