<?php 
  $dbServername="localhost";
  $dbUsername="root";
  $dbPassword="";
  $dbName="bantrangsuc";
  $conn= new mysqli($dbServername,$dbUsername, $dbPassword,$dbName);
  $query="DELETE FROM tbgiohang WHERE id='".$_GET['vl']."'";
  $rs= mysqli_query($conn,$query);
  header('location:giohang.php');
 ?>