<?php 
    include("publick.php");

   //自动登陆
    // if(empty($_POST["uname"])){
    //     $token = $_COOKIE["token"];
    //     echo $token;
    //     $tokenlog = "select uname from huawei where token='$token'";

    //     $tokenresult = getConnect($tokenlog);
    //     $tArr = mysqli_fetch_array($tokenresult);
    //     if($tArr){
    //         setCookie("username",$tArr["uname"],null,"/");
    //         echo "<script>location.href='./index.html'</script>";
    //     }else{
    //         setCookie("token","",null,"/");
    //         echo "<script>location.href='../login.html';</script>";
    //     }
    //  }else{
        $uname = $_POST["uname"];
        $pwd = $_POST["pwd"];
        $sql = "select uname,upwd from user where uname='$uname'";
        $result = getConnect($sql);
        $arr = mysqli_fetch_array($result);
       if($arr){
            if($arr["upwd"] === $pwd){
                setCookie("username",$arr["uname"],null,"/");
                if(!empty($_COOKIE["username"])){//token存在 ，选中了下次自动登录
                    //将tiken的cookie信息保存到原来的用户下
					$token = "update user set token=".$_COOKIE["username"]." where uname='".$arr["uname"]."'";
					getConnect($token);
					 setCookie("username",$arr["uname"],time()+10*24*3600,"/");
				}
                echo "1";
            }else{
                echo "2";
            }
        }else{
            echo "3";
        }
    // }


?>