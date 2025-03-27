<?php
session_start();
include("db.php");
mysqli_report(MYSQLI_REPORT_OFF);
$pagename="Checkout";      //Create and populate a variable called $pagename
echo "<link rel=stylesheet type=text/css href=mystylesheet.css>";    //Call in stylesheet
echo "<title>".$pagename."</title>";   //display name of the page as window title
echo "<body>";
include ("headfile.html");  
include ("detectlogin.php") ; //include header layout file
echo "<h4>".$pagename."</h4>"; //display name of the page on the web page
//display random text

$currentdatetime = date('Y-m-d H:i:s');
$SQL = "INSERT INTO orders (orderDateTime, orderStatus, userId) VALUES ('".$currentdatetime."', 'Placed', '".$_SESSION['userid']."')";

$exeSQL = mysqli_query($conn, $SQL);
// if($exeSQL){
//    echo "<p>Order Success</p>";

// }else{
//    echo "<p>Order Error</p>";

// }


if($exeSQL && isset($_SESSION['basket']) && count($_SESSION)>0 ){

    echo "<p>Order Success</p>";
    $SQL = "SELECT MAX(orderNo) AS orderNo FROM orders WHERE userId = '".$_SESSION['userid']."'";
    $exeSQL = mysqli_query($conn, $SQL);
    $arrayo = mysqli_fetch_array($exeSQL);  
    $orderNo = $arrayo['orderNo'];

    echo "<p>OrderNo: ".$orderNo."</p>";
    echo "<p><table>";
  echo "<tr>";
  echo "<th> Product Name </th>";
  echo "<th> Price </th>";
 echo "<th> Quantity </th>";
 echo "<th> Subtotal </th>";
 echo "</tr>";
 $total =0;
 foreach ($_SESSION['basket'] as $index => $value )
    {

        $SQL = "SELECT * FROM Product WHERE prodId = ".$index;
        $exeSQL = mysqli_query($conn, $SQL);
        $arrayp = mysqli_fetch_array($exeSQL);
        echo "<tr>";
        echo "<td>".$arrayp['prodName']."</td>";
        echo "<td>&pound" .number_format($arrayp['prodPrice'],2) . "</td>";
        echo "<td>".$arrayp['prodQuantity']."</td>";
        echo "<td>&pound".number_format($arrayp['prodPrice']*$value,2)."</td>";
        echo "</tr>";

        $SQL = "INSERT INTO order_line (orderNo, prodId, quantityOrdered, subTotal) VALUES ('".$orderNo."', '".$index."', '".$value."', '".$arrayp['prodPrice']*$value."')";
        $exeSQL = mysqli_query($conn, $SQL);
        $total = $total + $arrayp['prodPrice']*$value;

    }
    echo "<tr>";
    echo "<td colspan='3'>Total</td>";
    echo "<td>&pound" .number_format($total,2) . "</td>";
    echo "</tr>";

    $SQL = "UPDATE orders SET orderTotal = '".$total."' WHERE orderNo = '".$orderNo."'";
    $exeSQL = mysqli_query($conn, $SQL);




 echo "</table>";
 

}else{

    echo "<p>Order Error</p>";
}
unset($_SESSION['basket']);
include("footfile.html"); //include head layout

echo "</body>";

?>