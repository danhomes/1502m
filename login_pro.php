<?php
header("content-type:text/html;charset=utf8");
$user=$_POST['user'];
$pwd=$_POST['pwd'];
$db=new PDO("mysql:host=127.0.0.1;dbname=month8",'root','root');
$db->exec("set names utf8");
$sql="select * from user where user='$user'";
//echo $sql;die;
$re=$db->query($sql);
$info=$re->fetch(PDO::FETCH_ASSOC);
//print_r($info);die;
//echo $info['is'];die;
if($info['is']==1){
    $pwd=md5($pwd);
    $sql="select * from user where user='$user' and pwd='$pwd'";
    $res=$db->query($sql);
    $infos=$res->fetch(PDO::FETCH_ASSOC);
//    print_r($infos);die;
    echo "<script>alert('登陆成功');location.href='list.php'</script>";
}else if($info['is']==0){
//    echo 1;die;
    $sql="select * from user where user='$user' and pwd='$pwd'";
    $arr=$db->query($sql);
    $arrs=$arr->fetch(PDO::FETCH_ASSOC);
//    print_r($arrs);die;
    if(!empty($arrs)){
        $id=$arrs['u_id'];
//        echo $id;die;
        $sql="update `user` set `is`=1 where u_id=$id";
//        echo $sql;die;
        $a=$db->exec($sql);
//        echo $a;die;
        if($a){
            echo "<script>alert('登陆成功');location.href='list.php'</script>";
        }else{
            echo "<script>alert('登陆失败');location.href='login.php'</script>";
        }

    }else{
        echo "<script>alert('登陆失败');location.href='login.php'</script>";
    }
//    print_r($arrs);die;

}else{
    echo "<script>alert('登陆失败');location.href='login.php'</script>";
}

