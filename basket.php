<?php
session_start();
include("db.php");
$pagename = " Smart Basket";      //Create and populate a variable called $pagename
echo "<link rel=stylesheet type=text/css href=mystylesheet.css>";    //Call in stylesheet
echo "<title>".$pagename."</title>";   //display name of the page as window title
echo "<body>";
include ("headfile.html");    //include header layout file
include("detectlogin.php");
   
echo "<h4>".$pagename."</h4>"; //display name of the page on the web page
//display random text



//if the value of the product id to be deleted (which was posted through the hidden field) is set
if (isset($_POST['del_prodid']))
{
//capture the posted product id and assign it to a local variable $delprodid
$delprodid=$_POST['del_prodid'];
//unset the cell of the session for this posted product id variable
unset ($_SESSION['basket'][$delprodid]);
//display a "1 item removed from the basket" message
echo "<p>1 item removed";
}


if (isset($_POST['h_prodid'])) {

    //echo "<p>Product in the basket";
$newprodid = $_POST['h_prodid'];
$reququantity = $_POST['p_quantity'];


//echo "<p> Selected Product ID :".$newprodid;
//echo "<br> Quantity of selected  product :".$reququantity;

//create a new cell in the basket session array. Index this cell with the new product id.
//Inside the cell store the required product quantity
$_SESSION['basket'][$newprodid]=$reququantity;
echo "<p>1 item added</p>";
echo "<br>";
}
else{

   // echo "<p>Basket Unchanged";


}

$total = 0;
echo "<p><table id ='baskettable'>";
echo "<tr>";
echo "<th> Product Name </th>";
echo "<th> Price </th>";
echo "<th> Quantity </th>";
echo "<th> Subtotal </th>";
echo "<th> Remove Product</th>";
echo "</tr>";


if(isset($_SESSION['basket']))
{

 foreach ($_SESSION['basket'] as $index => $value )
 {

    $index = intval($index); // Ensure it's an integer
    $SQL =  "SELECT prodId, prodName, prodPrice FROM product WHERE prodId = $index";

   // $SQL =  "select prodId,prodName, prodPrice from product where prodId =".$index;
    $exeSQL = mysqli_query($conn, $SQL) or die (mysqli_error($conn)) ;

     $arrayp=mysqli_fetch_array($exeSQL);

    echo "<tr>";
    echo "<td>" . $arrayp['prodName'] . "</td>";
    echo "<td>&pound" .number_format($arrayp['prodPrice'],2) . "</td>";
    echo "<td style = 'text-align:center;'>" . $value . "</td>";

    $subtotal = $arrayp['prodPrice'] * $value;
    echo "<td >&pound" .number_format($subtotal,2) . "</td>";

    echo "<form action=basket.php method=post>";
    echo "<td> ";
    echo "<input type=submit value='Remove' id ='submitbtn'>";
    echo "</td>";
    echo "<input type=hidden name='del_prodid' value=".$index.">";
    echo "</form>";
    echo "</tr>";

    
    $total = $total + $subtotal;


     }
 

}else{

    echo" <p> empty basket";

}
echo "<tr>";
echo "<td colspan = 4> TOTAL </td>";
echo "<td>&pound" .number_format($total,2) . "</td>";
echo "</tr>";
echo "</table>";

echo "<br>";
echo "<p> <a href='clearbasket.php'> Clear Basket </a> </p>";
echo "</br>";
if(isset($_SESSION['userid'])){
    echo "<p> to finalize your order: <a href='checkout.php'> Checkout </a> </p>";
}else{
    echo "<p>  New hometeq Customers : <a href='signup.php'> Sign Up </a> </p>";
echo "<p> Retuening hometeq Customers : <a href='login.php'> Login </a> </p>";
}

include("footfile.html"); //include head layout


echo "</body>";

?>