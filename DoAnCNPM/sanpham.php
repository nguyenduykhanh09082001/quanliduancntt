<?php
session_start();
require("Database/KetNoi.php");
?>
<html>
<head>
<meta charset="UTF-8"/>
<link rel="stylesheet" href="Heade/heade.css">
<link rel="stylesheet" href="sanpham.css">
<link rel="stylesheet" href="Footer/footer.css">
</head>
<body>
<?php
  require("Heade/heade.php");
?>
  <div id="main">
    <div id="left">
<?php
  $query="select * from tbsanpham where masp='".$_REQUEST['item']."'";
  $rs= mysqli_query($conn,$query);
  $i=0;
  $count=0;
  while($row=mysqli_fetch_array($rs,MYSQLI_ASSOC))
  {
	$anh[$i]=$row['anh'];
	$ten[$i]=$row['tensp'];
	$gia[$i]=$row['gia'];
	$ma[$i]=$row['masp'];
	$mo_ta[$i]=$row['mota'];
	$i++;
  }
  
    echo "
	  <img src='".$anh[0]."'/>
	</div>
	<div id='right'>
	  <form method='POST' action=''>
	    <h1 id='name' name='tensp'>".$ten[0]."</h1>
	    <h1 id='price'>Giá: ".number_format($gia[0])."đ</h1>"; 
?>
	    
	    <h4>Miễn phí giao hàng</h4>
		<h4>Đổi hàng sau 48h</h4>
		<input type="submit" value="Thêm vào giỏ hàng" name="submit"/>
	  </form>	
	</div>
<?php
if(isset($_POST['submit']) && isset($_SESSION['username']))
{
 include("Cart/themvaogiohang.php"); 
 echo"<script>
        alert('Thêm vào giỏ hàng thành công!');
      </script>
 ";
 header("Refresh:0");
}
if(isset($_POST['submit']) && !isset($_SESSION['username']))
{
  echo"<script>
        alert('Vui lòng đăng nhập!');
      </script>
 ";
}
?>
<div id="description">
	  <h2>
	    Thông tin sản phẩm
	  </h2>	
	  <h4>
	  <?php echo $mo_ta[0];?>
	  </h4>
	</div>
 </div>
<?php
  require('Footer/footer.php');
?>
</body>
</html>