<?php
require_once 'config.php';

if(!$C->check_login())
{
    header('Location: index.php?action=index');
    exit;
}
if(isset($_POST['comment']) && isset($_POST['blog']) && isset($_POST['padding'])) {
    @$C->comment();
    echo "<script>alert('ok');self.location='index.php?action=profile'; </script>";
    exit;
}
else{

?>

<!DOCTYPE html>
<html>
<head>
    <title>Profile</title>
    <link href="static/bootstrap.min.css" rel="stylesheet">
    <script src="static/jquery.min.js"></script>
    <script src="static/bootstrap.min.js"></script>
</head>
<body>
<center>
    <div class="container" style="margin-top:100px">
        <h3>Hi <?php echo $C->username;?></h3><br>
        <form method='post' action="index.php?action=profile">
            <p>请输入评论: <br><textarea name="comment"></textarea></p>
            <p>您的博客地址: <br><input name='blog' type='text'></p>
            <input type="hidden" name="padding" value = "0">
            <input type="submit" value="Submit" />

        </form>
    </div>
</center>
</body>
</html>
<?php }?>