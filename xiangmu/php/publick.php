<?php 
    header("Content-Type:text/html;charset=utf-8");
    function getConnect($sql){
        $db = mysqli_connect("localhost","root","root");
        mysqli_select_db($db,"huawei");
        mysqli_query($db,"set names utf8");
        $result = mysqli_query($db,$sql);
        return $result;
    }
?>