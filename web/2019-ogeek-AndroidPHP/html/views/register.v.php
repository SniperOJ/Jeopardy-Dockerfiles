<?php
require_once 'config.php';

if(isset($_POST['username']) && isset($_POST['password'])) {

    if($C->register())
    {
            header('Location: index.php?action=index');
            exit;

    }
    else
    {
        echo "<script>alert('register error');self.location='index.php?action=register'; </script>";
        exit;
    }
}
else {
    $code = rand_s(3);
    $md5c = substr(md5($code),0,4);
    $c_view = "substr(md5(?), 0, 4) === $md5c";
    $_SESSION['code'] = $md5c;
    ?>
    <!DOCTYPE html>
    <html>
    <head>
        <title>REGISETER</title>
        <link href="static/bootstrap.min.css" rel="stylesheet">
        <script src="static/jquery.min.js"></script>
        <script src="static/bootstrap.min.js"></script>
    </head>
    <body>
    <div class="container" style="margin-top:100px">
        <form action="index.php?action=register" method="post" class="well" style="width:220px;margin:0px auto;">
            <img src="static/piapiapia.gif" class="img-memeda " style="width:180px;margin:0px auto;">
            <h3>Register</h3>
            <label>Username:</label>
            <input type="text" name="username" style="height:30px"class="span3"/>
            <label>Password:</label>
            <input type="password" name="password" style="height:30px" class="span3">
            <button type="submit" class="btn btn-primary">REGISTER</button>
        </form>
    </div>
    </body>
    </html>
    <?php
}
?>
