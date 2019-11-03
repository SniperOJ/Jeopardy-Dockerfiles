<?php
require_once 'config.php';

if($C->check_login()) {
    header('Location: index.php?action=profile');
    exit;
}
if(isset($_POST['username']) && isset($_POST['password'])) {
   if($C->login())
   {
       header('Location: index.php?action=profile');
       exit;
   }
   else
   {
       echo "<script>alert('username or password wrong');self.location='index.php?action=index'; </script>";
       exit;
   }
}
else {
    ?>
    <!DOCTYPE html>
    <html>
    <head>
        <title>Login</title>
        <link href="static/bootstrap.min.css" rel="stylesheet">
        <script src="static/jquery.min.js"></script>
        <script src="static/bootstrap.min.js"></script>
    </head>
    <body>
    <div class="container" style="margin-top:100px">
        <form action="index.php?action=index" method="post" class="well" style="width:220px;margin:0px auto;">
            <img src="static/piapiapia.gif" class="img-memeda " style="width:180px;margin:0px auto;">
            <h3>Login</h3>
            <label>Username:</label>
            <input type="text" name="username" style="height:30px"class="span3"/>
            <label>Password:</label>
            <input type="password" name="password" style="height:30px" class="span3">

            <button type="submit" class="btn btn-primary">LOGIN</button>
            <!--source: /html.zip -->
        </form>
    </div>
    </body>
    </html>
    <?php
}
?>
