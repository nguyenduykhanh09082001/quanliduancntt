<?php
  require("../Database/KetNoi.php");
  $query="select CURRENT_TIMESTAMP();";
  $rs=(mysqli_query($conn,$query));
  while($row=mysqli_fetch_assoc($rs))
  {
	 $da=$row['CURRENT_TIMESTAMP()'];
  }
  $query="select * from tbgiohang,login where login.sdt=tbgiohang.sdt and login.sdt='".$_REQUEST["vl"]."';";
  $rs=(mysqli_query($conn,$query));
  $i=0;
  while($row=mysqli_fetch_array($rs,MYSQLI_ASSOC))
  {
	 $name=$row['name'];
	 $addr=$row['addr'];
	 $sdt=$row['sdt'];
	 $masp[$i]=$row['masp'];
	 echo $masp[$i];
	 $dongia[$i]=$row['dongia'];
	 $i++;
  }
  $query="select SUM(dongia) from tbgiohang where tbgiohang.sdt='".$_REQUEST["vl"]."';";
  $rs=(mysqli_query($conn,$query));
  while($row=mysqli_fetch_array($rs,MYSQLI_ASSOC))
  {
	 $tongtien=$row['SUM(dongia)'];
  }
  $query="INSERT INTO tbhoadon (tenkh,diachi,sdt,ngaymua,tongtien) VALUES ('".$name."','".$addr."','".$sdt."','".$da."','".$tongtien."');";
  $rs= mysqli_query($conn,$query); 
  $value=mysqli_insert_id($conn);
  for($j=0;$j<$i;$j++)
    {
	  $query="DELETE FROM tbgiohang WHERE masp='".$masp[$j]."'";
      $rs= mysqli_query($conn,$query); 
	}
	echo"
		<script>
		  alert('Thanh toán thành công!');
		  var src='giohang.php';
		  window.location.href=src;		
		</script>";
?>
