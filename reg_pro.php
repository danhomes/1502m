<?php
header("content-type:text/html;charset=utf8");
$user=$_POST['user'];
$pwd=$_POST['pwd'];
$is=1;
$pwd=md5($pwd);
$db=new PDO("mysql:host=127.0.0.1;dbname=month8",'root','root');
$db->exec("set names utf8");
$sql="insert into user (`user`,`pwd`,`is`) values('$user','$pwd','$is')";
//echo $sql;die;
$re=$db->exec($sql);
if($re){
    echo "<script>alert('注册成功');location.href='list.php'</script>";
}else{
    echo "<script>alert('注册失败');location.href='reg.php'</script>";
}