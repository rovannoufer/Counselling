
<?php

$con = new mysqli('localhost','root','','counselling');

$name = $pass = "";

session_start();


if($_SERVER["REQUEST_METHOD"] == "POST"){

$name=$_REQUEST['username'];
$pass=$_REQUEST['password'];

$_SESSION['username'] = $name;


        if($name=='admin' and $pass=='admin'){
            header("location:adminpage.php");
        }else{
           $sql = "select username,password from kct where username='$name' and password='$pass';";
           $c=mysqli_query($con,$sql);
              if (mysqli_num_rows($c)>0) 
              {
                echo ("<script LANGUAGE='JavaScript'>
                window.alert('Logged in Succesfully');
                window.location.href='main.php';
                </script>");

              }
                else {
                 echo ("<script LANGUAGE='JavaScript'>
                window.alert('invalid user name or password');
                window.location.href='login.html';
                </script>");

              }
           }

}
    $con->close();
?>
