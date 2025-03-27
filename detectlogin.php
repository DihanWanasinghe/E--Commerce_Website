<?php
if(isset($_SESSION['userid'])){
    echo "<p style='text-align: right;'>  ".$_SESSION['fname']." ".$_SESSION['sname']." | User Type:".$_SESSION['userType']. "</p>";
   
}
?>