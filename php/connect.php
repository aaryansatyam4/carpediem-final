<?php
$name= $_POST['fullname'];
$usrname=$_POST['username'];
$email=$_POST['email'];
$phone=$_POST['phone'];
$password=$_POST['password'];
$gender=$_POST['gender'];

$conn = new mysqli('localhost','root','','test');
if($conn->connect_error){
    die('connection failed: '.$conn->connect_error);
}
else{
    $stmt=$conn->prepare("insert into register(name,usrname,email,password,gender,phone)
    values(?,?,?,?,?,?)");
    $stmt->bind_param("sssssi",$name,$usrname,$email,$password,$gender,$phone);
    $stmt->execute();
    echo "registration succesful";
    $stmt->close();
    $conn->close();
}
?>