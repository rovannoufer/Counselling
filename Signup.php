<?php
$con = new mysqli('localhost','root','','counselling');


$nm = $em = $pw = "";

if($_SERVER["REQUEST_METHOD"] == "POST"){

$fn=$_REQUEST['firstname'];
$ln=$_REQUEST['lastname'];
$un=$_REQUEST['username'];
$em=$_REQUEST['email'];
$mb=$_REQUEST['mobileno'];
$pw=$_REQUEST['password'];



        $sql = "INSERT INTO kct (firstname,lastname,username,email,mobileno,password) values('$fn','$ln','$un','$em','$mb','$pw');";

            if ($con->query($sql) === TRUE) 
            {
                echo ("<script LANGUAGE='JavaScript'>
                window.alert('Registered Succesfully');
                window.location.href='login.html';
                </script>");
            }
             else {
            echo "Error: " . $sql . "<br>" . $conn->error;
             }
        
}

    $con->close();

?>