<?php
  require("Database/KetNoi.php");
  $query="select sdt,masp,tensp,anh,gia from login,tbsanpham where user='".$_SESSION['username']."' and masp='".$_REQUEST['item']."';";
  $rs=(mysqli_query($conn,$query));
  while($row=mysqli_fetch_array($rs,MYSQLI_ASSOC))
  {
	 $sdt=$row['sdt'];
	 $masp=$row['masp'];
	 $ten=$row['tensp'];
	 $anh=$row['anh'];
	 $gia=$row['gia'];
  }
  $query="INSERT INTO tbgiohang (masp,tensp,anh,soluong,dongia,sdt) VALUES ('".$masp."','".$ten."','".$anh."','1','".$gia."','".$sdt."');";
  $rs= mysqli_query($conn,$query);
?>
