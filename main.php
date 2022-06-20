<?php

session_start();

$con = new mysqli('localhost','root','','counselling');

$un=$des=$date=$time="";

$un=$_SESSION['username'];

if($_SERVER["REQUEST_METHOD"] == "POST"){

$date=$_REQUEST['date'];
$time=$_REQUEST['time'];
$des=$_REQUEST['description'];


        $sql = "INSERT INTO consulting(username,description,date,time) values('$un','$des','$date','$time');";

            if ($con->query($sql) === TRUE) 
            {
                echo ("<script LANGUAGE='JavaScript'>
                window.alert('request submitted succesfully');
                window.location.href='main.php';
                </script>");
            }
             else {
                echo "Error: " . $sql . "<br>" . $conn->error;
             }
}
    $con->close();

?>







<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Login sucess full</title>
        <link rel="stylesheet" type="text/css" href="./css/bookslot.css"/>
        <link rel="shortcut icon" type="image/png" href="/img/favicon-32x32.png" sizes="32x32">
        
    </head>
<body>
    <div>
        <div class="body">
          <div class="container" id="container">
            <div class="form-container sign-in-container">
                <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" id="form_id" name="myform">
                    <img style="margin-top: 0%;" src="./img/KCT_logo.svg" height="150px" width="150px">
                    <input   type="date" id="date" name="date"
                                value="2018-07-22" min="2000-01-01" max="2018-12-31"> <br><br>
                    <select class="time" name="time" id="time"> 
                       <option value="10:00 - 11:00">10:00AM - 11:00AM</option>
                       <option value="11:00 - 12:00">11:00AM - 12:00PM</option>
                       <option value="2:00 - 3:00">2:00PM - 3:00PM</option>
                       <option value="3:00 - 4:00">3:00PM - 4:00PM</option>
                    </select>
                    <br><br>
                    <a href="./login.html" class="center"> <button value="Confirm" id="submit">BOOK</button> </a> <br>
                </form>
            </div>
            <div class="overlay-container">
                <div class="overlay">
                    <div class="overlay-panel overlay-right">
                        <h1>Hello,  <?php echo $un;?> !</h1><br><br><br>
                        <textarea  placeholder= "Feel free to share your thoughts!!..." name = "description" id="description"  form="form_id"></textarea>
                        <br>
                        <a href="./user.php" style="color:aliceblue;">check</a>
                        <!-- <a href="./main.html"><button class="bookingbutton"  id="submit"> Submit</button></a> -->
                    </div>
                </div>
            </div>
          </div>
        </div> 
    </div> 
</body>
</html>

