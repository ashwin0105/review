<?php
$host="localhost";
$user="root";
$password="";
$db="user";
session_start();
$data=mysqli_connect($host,$user,$password,$db);
if($data===false){
    die("connection error");
}
if($_SERVER["REQUEST_METHOD"]=="POST")
{
    $username=$_POST["username"];
    $password=$_POST["password"];
    $sql="select*from login where username='".$username."' and password='".$password."'";
    $result=mysqli_query($data,$sql);
    $row=mysqli_fetch_array($result);
    if($row["usertype"]=="admin")
    {
        $_SESSION["username"]=$username;
        header("location:adminhome.html");
    }
    elseif($row["usertype"]=="user")
    {
        $_SESSION["username"]=$username;
        header("location:index/index.html");
    }
    else{
        echo "invalid username and password";
    }
}