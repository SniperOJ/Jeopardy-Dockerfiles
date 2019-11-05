<?php
require_once('config.php');
class Customer
{
    public $username,$userid;

    public function __construct()
    {
        $this->username = isset($_SESSION['username'])?$_SESSION['username']:'';
        $this->userid = isset($_SESSION['userid'])?$_SESSION['userid']:-1;
    }

    public function check_login()
    {
        return isset($_SESSION['userid']);
    }


    function login()
    {
        if($_POST['username'] && $_POST['password']) {
            $username = addslashes($_POST['username']);
            $password = md5($_POST['password']);
            if(strlen($username) < 3)
                die('Invalid user name');
            $sql = "select id,user from users where user = '".addslashes_to_sqlite($username)."' and pass = '$password'";
            $db = new Data_db();
            @$ret = $db->querySingle($sql,true);
            $db->close();
            if($ret)
            {
                $_SESSION['userid'] = $ret['id'];
                $_SESSION['username'] = $username;
                $this->username = $username;
                $this->userid = $ret['id'];
                return true;
            }
            else
            {
                return false;
            }

        }
        else
            return false;

    }

    private function is_exists($username)
    {
        $sql = "select user from users where user = '".addslashes_to_sqlite($username)."'";
        $db = new Data_db();
        @$ret = $db->querySingle($sql);
        $db->close();
        if($ret)
            return true;
        else
            if(preg_match("/(RANDOMBLOB)|;/is",$username))
                return true;
            return false;
    }

    function register()
    {
        if($_POST['username'] && $_POST['password'] ) {

            $username = addslashes($_POST['username']);
            $password = md5($_POST['password']);

            if(strlen($username) < 3)
                die('Invalid user name');
            if(!$this->is_exists($username)) {
                $db = new Data_db();
                $sql = "select max(id)+1 from users";
                @$ret = $db->querySingle($sql);
                if(!$ret)
                    return false;
                $nid = $ret;
                $sql = "insert into users(id,user,pass) values($nid,'".addslashes_to_sqlite($username)."','$password')";
                @$ret = $db->exec($sql);
                if(!$ret)
                    return false;
                $sql = "insert into file(userid,email,commentsize) values ($nid,'test@test.com','200')";
                @$ret = $db->exec($sql);
                $db->close();
                if($ret)
                    return true;
                else
                    return false;

            }

            else {
                die("The username is not unique");
            }
        }
        else
        {
            return false;
        }
    }

    function comment()
    {
        if(!$this->check_login()) return false;
        if($_POST['comment'] ) {

            $comment = $_POST['comment'];
            $sql = "select user from users where id = '".$this->userid."'";
            $db = new Data_db();
            @$ret = $db->querySingle($sql) or 0;
            $db->close();
            $username = $ret;
            $email = $username."@ctf.com";
            $sql = "UPDATE file SET email = '".addslashes_to_sqlite($email)."' where id = ".$this->userid;
            $db = new Data_db();
            @$ret = $db->exec($sql);
            $br_padding = (int)($_POST['padding']);
            $comment_size = strlen($comment);
            $sql = "select commentsize from file where userid = ".$this->userid."";
            $db = new Data_db();
            @$ret = $db->querySingle($sql) or 0;
            $db->close();
            if($ret)
            {
                $max_comment_size = $ret;
            }
            else
            {
                $max_comment_size = -1;
            }
            if(( $comment_size + $br_padding) > $max_comment_size)
            {

                //移除掉所有html标签
                $comment = preg_replace('/(<.*>)+/','',$comment);
                if(strlen($comment) > $max_comment_size)
                {
                    //无论发不发邮件你都能拿到flag，不是吗？
                    //send_mail($email,"评论长度超过该用户最大限制!");
                    return true;
                }
                else
                {
                    $email = "admin@ctf.cn";
                    //无论发不发邮件你都能拿到flag，不是吗？
                    //send_mail($email,$comment);
                    return true;
                }
            }
            else
            {
                //只移除br标签
                $comment = preg_replace('/(<(\/)?br>)+/','',$comment);
                $email = "admin@ctf.cn";
                //无论发不发邮件你都能拿到flag，不是吗？
                //send_mail($email,$comment);
                return true;
            }

        }
        else
        {
            return false;
        }
    }
}

$C = new Customer();
$action = isset($_GET['action'])?$_GET['action']:'index';

switch ($action){
    case 'index':
        require_once 'views/index.v.php';
        break;
    case 'register':
        require_once 'views/register.v.php';
        break;
    case 'profile':
        require_once 'views/profile.v.php';
        break;
    case 'logout':
        require_once 'views/logout.v.php';
        break;
    default:
        die("error");
        break;

}
?>
