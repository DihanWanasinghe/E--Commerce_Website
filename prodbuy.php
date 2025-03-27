<?php
session_start();
include ("db.php"); //include db.php file to connect to DB
$pagename="A smart buy for smart home";      //Create and populate a variable called $pagename
echo "<link rel=stylesheet type=text/css href=mystylesheet.css>";    //Call in stylesheet
echo "<title>".$pagename."</title>";   //display name of the page as window title
echo "<body>";
include ("headfile.html"); 
include("detectlogin.php");
   //include header layout file
echo "<h4>".$pagename."</h4>"; //display name of the page on the web page
//display random text

//retrieve the product id passed from previous page using the GET method and the $_GET superglobal variable
//applied to the query string u_prod_id
//store the value in a local variable called $prodid
$prodid=$_GET['u_prod_id'];
//display the value of the product id, for debugging purposes
echo "<p>Selected product Id: ".$prodid;
$SQL="select prodId, prodName,prodPicNameLarge ,prodDescripLong,prodPrice,prodQuantity from Product where prodId=".$prodid;
//run SQL query for connected DB or exit and display error message
$exeSQL=mysqli_query($conn, $SQL) or die (mysqli_error($conn));
echo "<table style='border: 0px'>";
//create an array of records (2 dimensional variable) called $arrayp.
//populate it with the records retrieved by the SQL query previously executed.
//Iterate through the array i.e while the end of the array has not been reached, run through it
while ($arrayp=mysqli_fetch_array($exeSQL))
{
echo "<tr>";
echo "<td style='border: 0px'>";
//display the small image whose name is contained in the array
echo "<a href=prodbuy.php?u_prod_id=".$arrayp['prodId'].">";
echo "<img src=images/".$arrayp['prodPicNameLarge']." height=200 width=200>";
echo "</a>";
echo "</td>";
echo "<td style='border: 0px'>";
echo "<p><h5>".$arrayp['prodName']."</h5>"; //display product name as contained in the array
//echo "</td>";
//echo "<td style='border: 0px'>";
echo "<p>".$arrayp['prodDescripLong']."</p>";
echo "<br>";
//echo "</td>";
//echo "<td style='border: 0px'>";
echo "<p><b>".$arrayp['prodPrice']."<b/></p>"; 
echo "<br>";
//echo "</td>";
//echo "<td style='border: 0px'>";
echo "<p> Left in Stock: ".$arrayp['prodQuantity']."</p>";
echo "<br>";
echo "<p>Number to be purchased: ";
//create form made of one text field and one button for user to enter quantity
//the value entered in the form will be posted to the basket.php to be processed
echo "<form action=basket.php method=post>";
echo "<select name = 'p_quantity'>";
  for($i = 1; $i<=$arrayp['prodQuantity']; $i++){

    echo "<option value=".$i ." >".$i. "</option>";

}
echo "</select>";
//echo "<input type=text name=p_quantity size=5 maxlength=3>";
echo "<input type=submit name='submitbtn' value='ADD TO BASKET' id='submitbtn'>";
//pass the product id to the next page basket.php as a hidden value
echo "<input type=hidden name=h_prodid value=".$prodid.">";
echo "</form>";
echo "</p>";


echo "</td>";
echo "</tr>";




// echo "</tr>";
// echo "<tr >";
// echo "<td style='border: 0px'>";
// echo "<p>".$arrayp['prodPrice']."</p>";
// echo "</td>";
// echo "</tr>";
// echo "<tr>";
// echo "<td style='border: 0px'>";
// echo "<p> Left in Stock: ".$arrayp['prodQuantity']."</p>";
// echo "</td>";
// echo "</tr>";
}
echo "</table>";



// echo "<p> Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut
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