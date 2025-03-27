<?php
session_start();
include("db.php");
$pagename="Sign Uo Results";      //Create and populate a variable called $pagename
echo "<link rel=stylesheet type=text/css href=mystylesheet.css>";    //Call in stylesheet
echo "<title>".$pagename."</title>";   //display name of the page as window title
echo "<body>";
include ("headfile.html");    //include header layout file
echo "<h4>".$pagename."</h4>"; //display name of the page on the web page
//display random text

$firstName = trim($_POST['r_fname']);
$lastName = trim($_POST['r_lname']);
$address = trim($_POST['r_address']);
$postcode =trim($_POST['r_postcode']);
$telNo = trim($_POST['r_telno']);
$email = trim($_POST['r_email']);
$password1 = trim($_POST['r_password']);
$password2 = trim($_POST['r_password2']);

$reg = "/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$/";

if (empty($firstName) or empty($lastName) or empty($address) or empty($postcode) or empty($telNo) or empty($email)or
empty($password1)or empty($password2)) //check if any of the variables that captured the posted values are empty
{
echo "<p><b>Sign-up failed!</b></p>";
echo "<br><p>Your signup form is incomplete and all fields are mandatory";
echo "<br>Make sure you provide all the required details</p>";
echo "<br><p>Go back to <a href=signup.php>sign up</a></p>";
echo "<br><br><br><br>";
}elseif($password1 <> $password2){
 

    echo "<p><b>Sign-up failed!</b></p>";
    echo "<br><p>The 2 passwords are not matching";
    echo "<br>Make sure you enter them correctly</p>";
    echo "<br><p>Go back to <a href=signup.php>sign up</a></p>";
    echo "<br><br><br><br>";



 }elseif (!preg_match($reg, $email)){
        echo "<p><b>Sign-up failed!</b></p>";
        echo "<br><p>Email not valid";
        echo "<br>Make sure you enter a valid email</p>";
        echo "<br><p>Go back to <a href=signup.php>sign up</a></p>";
        echo "<br><br><br><br>";
 }else{

$SQL = "INSERT INTO Users (userType, userFName, userSName, userAddress, userPostCode, userTelNo, userEmail, userPassword) 
VALUES ('C', '".$firstName."', '".$lastName."', '".$address."', '".$postcode."', '".$telNo."', '".$email."', '".$password1."')";
if(mysqli_query($conn, $SQL) ){

echo "<p><b>Sign-up successful!</b></p>";
echo "<br><p>To continue, please <a href=login.php>login</a></p>";
}else{

//display sign up failure
echo "<p><b>Sign-up failed!</b></p>";
//echo "<br><p>SQL Error No: ".mysqli_errno($conn)."</p>"; //Retrieve the error number and display.
//echo "<p>SQL Error Msg: ".mysqli_error($conn)."</p>"; //Retrieve the error message and display.
//if the error detector returned the number 1062,
//the unique constraint is violated as the user entered an email which already existed
if (mysqli_errno($conn)==1062)
{
echo "<br><p>Email already in use";
echo "<br>You may be already registered or try another email address</p>";
}
//error code for inserting character that is problematic for SQL query
if (mysqli_errno($conn)==1064)
{
echo "<br><p>Invalid characters entered in the form";
$invalidchars="apostrophes like [ ' ] and backslashes like [ \ ]";
echo "<br>Make sure you avoid the following characters: ".$invalidchars. "</p>";
}
echo "<br><p>Go back to <a href=signup.php>sign up</a></p>";
echo "<br><br><br><br>";

}


}
//  echo "<p> Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut
// labore et dolore magna aliqua. Non consectetur a erat nam at lectus urna. Cras pulvinar mattis nunc sed
// blandit libero volutpat sed cras. Nunc aliquet bibendum enim facilisis gravida neque convallis a cras.
// Nunc consequat interdum varius sit. Nam aliquam sem et tortor consequat. Magna sit amet purus gravida. Non
// sodales neque sodales ut etiam sit. Tortor consequat id porta nibh venenatis. Ornare arcu odio ut sem
// nulla pharetra diam. Tincidunt ornare massa eget egestas purus. Pulvinar mattis nunc sed blandit libero
// volutpat sed. Nulla malesuada pellentesque elit eget. Varius quam quisque id diam vel quam elementum
// pulvinar. Aliquet eget sit amet tellus cras adipiscing enim eu turpis. Vestibulum lectus mauris ultrices
// eros in. Faucibus in ornare quam viverra. Hac habitasse platea dictumst vestibulum rhoncus. Parturient
// montes nascetur ridiculus mus. Dui accumsan sit amet nulla facilisi morbi tempus iaculis urna.";

include("footfile.html"); //include head layout

echo "</body>";

?>