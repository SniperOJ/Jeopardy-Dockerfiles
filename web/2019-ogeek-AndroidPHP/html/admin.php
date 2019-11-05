<?php
require_once('config.php');

if(isset($_POST['flag'])&& isset($_POST['code'])) {
    if(!isset($_SESSION['admin_code']))
    {
        header('Location: admin.php');
        exit;
    }
    if(substr(md5($_POST['code']),0, 6)!== $_SESSION['admin_code'])
    {
        unset($_SESSION['admin_code']);
        header('Location: admin.php');
        exit;
    }
    $sql = "select code from admin";
    $db = new Data_db();
    $ret = $db->querySingle($sql);
    if ($ret) {
        if ($ret === $_POST['flag'])
        {
            session_unset();
            $sql = "update admin set code='".rand_s(5)."';";
            $ret = $db->exec($sql);
            die($flag);
        }
        else
        {
            unset($_SESSION['admin_code']);
            header('Location: admin.php');
            exit;

        }
    }
    else
    {
        unset($_SESSION['admin_code']);
        header('Location: admin.php');
        exit;
    }
}

else
{
    $code = rand_s(6);
    $md5c = substr(md5($code),0,6);
    $c_view = "substr(md5(?), 0, 6) === $md5c";
    $_SESSION['admin_code'] = $md5c;

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
            <h3>flag</h3><br>
            <form method='post' action="admin.php">
                <p>请输入flag兑换码: <br><input name='flag' type='text'></p>
                <p>captcha: <br><input name='code' type='text'></p>
                <?php echo  "<br><center>$c_view</center><br>";?>
                <input type="submit" value="Submit" />

            </form>
        </div>
    </center>
    </body>
    </html>
<?php
}
?>
