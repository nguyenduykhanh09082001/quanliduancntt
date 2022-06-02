<?php
session_start();
require("Database/KetNoi.php");
?>
<html>
<head>
<meta charset="UTF-8"/>
<link rel="stylesheet" href="Heade/heade.css">
<link rel="stylesheet" href="Footer/footer.css">
<link rel="stylesheet" href="trangchu.css">
</head>
<body>
<?php
  require("Heade/heade.php");
?>
<div id="main">
<div class="danhsach">
<?php
  $seach=$_REQUEST["value"];
  $count=0;
  $query="select *  from tbsanpham where tensp like '%".$seach."%';";
  $rs= mysqli_query($conn,$query);
	while($row=mysqli_fetch_array($rs,MYSQLI_ASSOC))
	{
	 $ma[$count]=$row['masp'];
	 $anh[$count]=$row['anh'];
	 $ten[$count]=$row['tensp'];
	 $gia[$count]=$row['gia'];
	 $count++;
	} 
  if($count==0)
  {
	 echo"
	   <p id='error'>Không tìm thấy sản phẩm</p>
	   <script>
        document.getElementById('main').style.height='150';
		</script>
	 ";
  }
  else
  {
	 for($i=0;$i<$count;$i++)
  { 
    echo "
	      <div class='list'>
	        <ul>
	          <li>
		        <a href ='sanpham.php?item=".$ma[$i]."' >
				  <img src='".$anh[$i]."'/>
				</a>
		        <p> ".$ten[$i]."</p>
		        <p class='price'>Giá: ".$gia[$i]." đ</p>
				<a class='see_move' href ='sanpham.php?item=".$ma[$i]."' >Xem chi tiết</a>
		      </li>
	        </ul>
	      </div>";
  } 
  $count;
  $dem=0;
  while($count>0)
  {
	$count=$count-4;
	$dem++;
  }
  $dem=$dem*500;
  echo "
        <script>
        document.getElementById('main').style.height='".$dem."';
		</script>
  ";
  }
?> 
</div>
</div>
<?php
  include('Footer/footer.php');
?>
</body>

</html>