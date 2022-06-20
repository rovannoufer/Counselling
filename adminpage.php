<?php

$con = new mysqli('localhost','root','','counselling');
$query="select * from consulting;";
$result=mysqli_query($con,$query);

$cid=$un=$desc=$date=$time=$status='';

if($_SERVER["REQUEST_METHOD"] == "POST"){

$cid=$_REQUEST['cid'];
$status=$_REQUEST['status'];

$sql="UPDATE consulting SET Status='$status' WHERE cid='$cid'";

if ($con->query($sql) === TRUE) 
{
    header("location:adminpage.php");  
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
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SE admin</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
</head>
<body class="antialiased bg-white">
    <div class="flex xl:w-[1280px] mx-auto  my-10 b-0 rounded-xl overflow-hidden h-screen bg-gray-50 ">
    <aside class="w-1/5 bg-gray-800 block">
        <div class="py-4 px-4 text-white flex flex-col justify-center space-y-10">
          <a class="text-3xl font-bold text-white text-center uppercase" href="#">Admin</a>
          <div class="text-2xl max-w-md font-semibold text-white text-center capitalize">hello admin</div>
          <a href="./login.html" class="px-8 py-3 justify-self-end text-center text-black hover:text-white bg-white  rounded-full baseline hover:bg-slate-900 uppercase tracking-widest">log out</a>
        </div>
    </aside>
    <div class="flex flex-col w-4/5 bg-gray-200">
    <div class="inline-block  w-full ">
    <div class="uppercase text-4xl text-center my-10">update catalog</div>
    <div class="overflow-hidden">
           <table class="min-w-full bg-gray-200">
            <thead class="bg-gray-200 border-b">
             <tr>
               <th scope="col" class="text-md font-semibold capitalize text-gray-900 px-6 py-4 text-left">
                 cid
               </th>
               <th scope="col" class="text-md capitalize font-semibold text-gray-900 px-6 py-4 text-left">
                username
              </th>
              <th scope="col" class="text-md capitalize font-semibold text-gray-900 px-6 py-4 text-left">
                description
              </th>
              <th scope="col" class="text-md capitalize font-semibold text-gray-900 px-6 py-4 text-left">
                date
              </th>
              <th scope="col" class="text-md capitalize font-semibold text-gray-900 px-6 py-4 text-left" >
                time
              </th>
              <th scope="col" class="text-md capitalize font-semibold text-gray-900 px-6 py-4 text-center">
                status
              </th>
              <th scope="col" class="text-md capitalize font-semibold text-gray-900 px-6 py-4 text-center" colspan="2">
                edit status
              </th>
            </tr>
          </thead>
          <tbody class="bg-gray-200">
          <?php if ($result->num_rows > 0): ?>
           <?php while($array=mysqli_fetch_row($result)): ?>
            <tr class="bg-white border-b transition duration-300 ease-in-out ">
              <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900"><?php echo $array[0];?></td>
              <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
              <?php echo $array[1];?>
              </td>
              <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
              <?php echo $array[2];?>
              </td>
              <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
              <?php echo $array[3];?>
              </td>
              <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
              <?php echo $array[4];?>
              </td>
              <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
              <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
               <label for="status"><?php echo $array[5];?></label>
              </td>
               <td>
                  <select name="status" id="status" class="text-center">
                    <option value="approved">approved</option>
                    <option value="disapproved">disapproved</option>
                  </select>
                <input type="hidden" id="cid" name="cid" value="<?php echo $array[0] ?>">
                <input type="submit" value="Submit" class="bg-white  ml-3 px-3 py-2 text-white b-0 rounded-md text-center cursor-pointer bg-gray-800 hover:bg-slate-900 font-semibold">
            </form> 
           </td>
            </tr>
            <?php endwhile; ?>
            <?php endif; ?>
            <?php mysqli_free_result($result); ?>  
          </tbody>
        </table>
    </div>
    </div>
    </div>
    </div>
  </div>


</body>
</html>