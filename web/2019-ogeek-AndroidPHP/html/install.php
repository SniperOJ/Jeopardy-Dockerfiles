<?php
require_once('config.php');
$db = new Data_db();
$sql =<<<EOF
      CREATE TABLE users
      (id INT PRIMARY KEY     NOT NULL,
      user           CHAR(100)   NOT NULL,
      pass           CHAR(100)   NOT NULL);
EOF;

$ret = $db->exec($sql);

$sql =<<<EOF
      CREATE TABLE admin
      (id INT PRIMARY KEY     NOT NULL,
      code           CHAR(100)   NOT NULL);
EOF;

$ret = $db->exec($sql);

$sql =<<<EOF
      CREATE TABLE file
      (userid INT NOT NULL,
       email  CHAR(100) NOT NULL,
       commentsize   INT   NOT NULL);
EOF;

$ret = $db->exec($sql);




$sql = "INSERT INTO admin (id,code) VALUES (1,'".rand_s(5)."')";
$ret = $db->exec($sql);


$sql = "insert into users(id,user,pass) values(1,'test','test')";
$ret = $db->exec($sql);
$sql =  "insert into file(userid,email,commentsize) values(1,'admin@vivo.com','200')";
$ret = $db->exec($sql);
$db->close();
?>