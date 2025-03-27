<?php
session_start();
include("db.php");
$pagename="Your Login Results";      //Create and populate a variable called $pagename
echo "<link rel=stylesheet type=text/css href=mystylesheet.css>";    //Call in stylesheet
echo "<title>".$pagename."</title>";   //display name of the page as window title
echo "<body>";
include ("headfile.html");    //include header layout file
echo "<h4>".$pagename."</h4>"; //display name of the page on the web page
//display random text

$email = trim($_POST['email']);
$password = trim($_POST['password']);

// echo "<p> Email: ".$email."</p>";
// echo "<p> Password: ".$password."</p>";

 //include head layout

if(empty($email) or empty($password)){
    echo "<p> Login failed! <br> Email or Password is empty</p>";
    echo "<p> Go back to <a href=login.php>login</a></p>";
}else{

    $SQL = "SELECT * FROM Users WHERE userEmail = '".$email."' ";
    $exeSQL = mysqli_query($conn, $SQL);
    
    $arrayu = mysqli_fetch_array($exeSQL);
    $nbrecs = mysqli_num_rows($exeSQL);
    if($nbrecs == 0){
        echo "<p> Email is not recognized </br>login again </p> <br>";
        echo "<p> Go back to <a href=login.php>login</a></p>";
    }else{
          
        if($arrayu['userPassword'] != $password){
            echo "<p> Password is not recognized <br>login again </p> <br>";
            echo "<p> Go back to <a href=login.php>login</a></p>";
    }else{
        echo "<p> Login successful </p>";
        $_SESSION['userid'] = $arrayu['userId'];
        $_SESSION['userType'] = $arrayu['userType'];
        $_SESSION['fname'] = $arrayu['userFName'];
        $_SESSION['sname'] = $arrayu['userSName'];
        echo "<p>Welcome:".$_SESSION['fname']." ".$_SESSION['sname']."</p>";
        echo "<p> User Type: " . ($_SESSION['userType'] == 'C' ? 'Customer' : $_SESSION['userType']) . "</p>";
        echo"</br>"; 
        echo "<p>Contunue Shopping for  <a href = 'index.php'>Home Tech </a></p>";
        echo "<p>View Your <a href ='basket.php'>Smart Basket</a></p>";


        // echo "<p> You have successfully logged in as ".$_SESSION['user']."</p>";
        // echo "<p> Continue shopping for <a href=products.php>products</a></p>";


    }
}

    
}

echo "</body>";
include("footfile.html");

?>