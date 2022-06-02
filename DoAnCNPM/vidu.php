<?php
session_start();
require("Database/KetNoi.php");
?>
<html>
<head>
<meta charset="UTF-8"/>
<link rel="stylesheet" href="Heade/heade.css">
<link rel="stylesheet" href="trangchu.css">
<link rel="stylesheet" href="Footer/footer.css">
</head>
<body>
<?php
  require("Heade/heade.php");
?>
  <div id="main">
    <div class="name">
	  <p>Đồng Hồ Nam</p>
	</div>
	<div class="danhsach">
<?php
  $query="select * from tbsanpham where phanloai=0";
  $rs= mysqli_query($conn,$query);
  $i=0;
  while($row=mysqli_fetch_array($rs,MYSQLI_ASSOC))
  {
	$anh[$i]=$row['anh'];
	$ten[$i]=$row['tensp'];
	$gia[$i]=$row['gia'];
	$ma[$i]=$row['masp'];
	$i++;
  }
  for($i=0;$i<4;$i++)
  { 
    echo "
	      <div class='list'>
	        <ul>
	          <li>
		        <a href ='sanpham.php?item=".$ma[$i]."' >
				  <img src='".$anh[$i]."'/>
				</a>
		        <p class='ten'> ".$ten[$i]."</p>
		        <p class='price'>Giá: ".number_format($gia[$i])."đ</p>
				<a class='see_move' href ='sanpham.php?item=".$ma[$i]."' >Xem chi tiết</a>
		      </li>
	        </ul>
	      </div>";
  }
?> 
    </div>
    <div class="show">
	  <a href="dongho.php">Tất Cả Đồng Hồ Nam</a>
	</div>
    <div class="name">
	  <p>Đồng Hồ Nữ</p>
	</div>
	<div class="danhsach">
<?php
  $query="select * from tbsanpham where phanloai=1";
  $rs= mysqli_query($conn,$query);
  $i=0;
  while($row=mysqli_fetch_array($rs,MYSQLI_ASSOC))
  {
	$anh[$i]=$row['anh'];
	$ten[$i]=$row['tensp'];
	$gia[$i]=$row['gia'];
	$ma[$i]=$row['masp'];
	$i++;
  }
  for($i=0;$i<4;$i++)
  { 
    echo "
	      <div class='list'>
	        <ul>
	          <li>
		        <a href ='sanpham.php?item=".$ma[$i]."' >
				  <img src='".$anh[$i]."'/>
				</a>
		        <p class='ten'> ".$ten[$i]."</p>
		        <p class='price'>Giá: ".number_format($gia[$i])."đ</p>
				<a class='see_move' href ='sanpham.php?item=".$ma[$i]."' >Xem chi tiết</a>
		      </li>
	        </ul>
	      </div>";
  }
?> 
   </div>
    <div class="show">
	  <a href="dongho1.php">Tất Cả Đồng Hồ Nữ</a>
	</div>
  </div>
<?php
  include('Footer/footer.php');
?>
</body>
</html>
