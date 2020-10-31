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
if (isset($_POST['fpass'])){

    $subject = "Востановления пароля";
    $datt = date('yy-mm-dd');
    $massage = "добрый день 
    для смены пароля перейдите по ссылке Lab2/pass_change.php?email=".$_POST['email']." Удачи!!!   ";
    mail($_POST['email'],$subject,$massage );
    echo "<h3> проверте почту</h3>";

}else{
    ?>

    <form method="post" action="" class="form">
    <h4>Если забыли пароль</h4>
    <input type="email" name="email"
           placeholder="Введите вашу почту" required class="form-control" pattern="\w+@\w+\.\w{2,6}">
    <input type="submit" name="fpass" value="Востановить пароль" class="btn btn-primary">

    </form>

<?php
}