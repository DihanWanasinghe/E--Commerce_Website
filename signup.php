<?php
$pagename="Sign Up"; //Create and populate a variable called $pagename
echo "<link rel='stylesheet' type='text/css' href='mystylesheet.css'>"; //Call in stylesheet
echo "<title>".$pagename."</title>"; //Display name of the page as window title
echo "<body>";
include ("headfile.html"); //Include header layout file
echo "<h4>".$pagename."</h4>"; //Display name of the page on the web page

// Display random text
echo "<form action='signup_process.php' method='post'>";
echo "<table style='border: 0px'>";
echo  "<tr>";
echo  "<td style='border: 0px'>First Name</td>";
echo  "<td style='border: 0px'><input type='text' name='r_fname' size =35></td>";
echo " </tr>";
echo  " <tr>";
echo  "<td style='border: 0px'>Last Name</td>";
echo  "<td style='border: 0px'><input type='text' name='r_lname' size =35></td>";
echo  "</tr>";
echo  "<tr>";   
echo  "<td style='border: 0px'>Address</td>";
echo  "<td style='border: 0px'><input type='text' name='r_address' size =35></td>";
echo  "</tr>";
echo  " <tr>";
echo  "<td style='border: 0px'>Postcode</td>";
echo  "<td style='border: 0px'><input type='text' name='r_postcode' size =35></td>";
echo  "</tr>";
echo  "<tr>";
echo  " <td style='border: 0px'>Tel No</td>";
echo  "<td style='border: 0px'><input type='text' name='r_telno' size =35></td>";
echo  " </tr>";
echo   "<tr>";
echo   "<td style='border: 0px'>Email Address</td>";
echo "<td style='border: 0px'><input type='email' name='r_email' size =35></td>";
echo "</tr>";
echo "<tr>";
echo "<td style='border: 0px'>Password</td>";
echo "<td style='border: 0px'><input type='password' name='r_password' maxlength=10 size=35></td>";
echo "</tr>";
echo "<tr>";
echo "<td style='border: 0px'>Confirm Password</td>";
echo "<td style='border: 0px'><input type='password' name='r_password2' maxlength=10 size=35></td>";
echo "</tr>";
echo "<tr>";
echo "<td style='border: 0px'><input type='submit' name= 'submitbtn' value='Sign Up'></td>";
echo "<td style='border: 0px'><input type='reset'  name = 'submitbtn'  value='Clear Form'></td>";
echo "</tr>";

echo "</table>";
echo "</form>";

include("footfile.html"); //Include footer layout

echo "</body>";

?>
