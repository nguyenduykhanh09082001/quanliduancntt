<?php
session_start();
require("../Database/KetNoi.php");
?>
<html>
<head>
<meta charset="UTF-8"/>
<link rel="stylesheet" href="../Heade/heade.css">
<link rel="stylesheet" href="../Footer/footer.css">
<style>
  #main
 {
   background:#ece7e7;
   height:100px;
   position:relative;
 } 
  #main #giohang
 {
   background:#ece7e7;
   width:73%;
   margin:0px 0px 0px 180px;
   position:absolute;
 }
  #main #giohang #trong
 {
   font-size:30px;
   text-align:center;
   margin-top:40px;
 }
  #main #giohang .item
 {
   background:#ece7e7;
   width:98%;
   margin:20px 0px 0px 10px;
 }
   #main #giohang .item .left
 {
   background:#ece7e7;
   height:170px;
   width:55%;
   margin:10px 0px 0px 10px;
   float:left;
 }
  #main #giohang .item .left .img
 {
   background:#ece7e7;
   height:150px;
   width:30%;
   margin:10px 0px 0px 10px;
   float:left;
 }
  #main #giohang .item .left .img img
 {
   margin:-20px 0px 0px 0px; 
   width:200px;
   height:200px;
 }
  #main #giohang .item .left .content
 {
   background:#ece7e7;
   height:150px;
   width:55%;
   margin:10px 0px 0px 250px;
   font-size:20px;
   line-height:80px;
 }
   #main #giohang .item .mid
 {
   background:#ece7e7;
   height:170px;
   width:18%;
   margin:0px 0px 0px 830px;
   line-height:120px;
   font-size:20px;
   text-align:center;
   color:red;
 }
   
 #tong_tien
 {
   background:#ece7e7;
   height:100px;
   width:25%;
   margin:0px 0px 0px 970px;
   line-height:100px;
   font-size:20px;
 }
 #tong_tien .btm
 {
   margin-left:50px;
   font-size:20px;
 }
  #main #giohang .item .bt
 {
   height:40px;
   width:4%;
   margin:-140px 0px 0px 1080px;
   text-align:center;
 }
 #main #giohang .item .bt:hover
 {
   background:pink;
   line-height:35px;
   text-align:center;
 }
</style>
</head>
<body>
  <div id="header">
    <div id="container">
	  <div id="logo">
	    <a href="../vidu.php">
	      <img src ="../logo.png" />
		</a>  
	  </div>
	  <div id="seach">
		<form method="POST" action="seach.php">
		  <input id="tx" type="text" name="tt" value=""/>
		  <input id="sm" type="submit" value="Seach" name="sm"/>
		</form>	
	  <?php
		if(isset($_POST['sm']))
		{
		  echo "
		<script>
                var src='".$_POST['tt']."';
                document.getElementById('tx').value=src;	      			  
        </script>
		";
		}
	  ?>
	  </div>
	  <div id="login">
	    <a href="rename.php" >
		  <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/1/12/User_icon_2.svg/440px-User_icon_2.svg.png"/>
		  <?php
		    echo "<p id='check'>".$_SESSION['username']."</p>";
		  ?>
		</a>
		<p id="mid">/</p>
		<?php
		  echo "<a href='../Custom/logout.php'><p id='p1'>Đăng xuất</p></a>";
		?>
	  </div>
	</div>
	<div id="menu">
	  <ul>
	    <li>
		  <a href="../dongho.php">Đồng Hồ Nam</a> 
		</li>
	    <li>
		  <a href="../dongho1_b.php">Đồng Hồ Nữ</a> 
		</li>

		<?php
		if(isset($_SESSION['username']))
	   { 
		  $query="select count(*) from login,tbgiohang where login.sdt=tbgiohang.sdt and login.user='".$_SESSION['username']."'";
          $rs= mysqli_query($conn,$query);
          while($row=mysqli_fetch_assoc($rs))
        {
	       $count=$row['count(*)'];
        }
		echo "
		<li>
		  <a href='Cart/giohang.php'>Giỏ Hàng(".$count.")</a> 
		</li>
		";
	   }	
		?>
	  </ul>
	</div>
  </div>
<div id="main">
  <div id="giohang">
    <?php
	    $query="SELECT sdt FROM login where user='".$_SESSION['username']."'";
        $rs= mysqli_query($conn,$query);
        while($row=mysqli_fetch_array($rs,MYSQLI_ASSOC))
        {
		 $sdt=$row['sdt'];
        }
		$query="SELECT id,tensp,anh,soluong,dongia FROM tbgiohang WHERE sdt='".$sdt."' AND trangthai=0";
        $rs= mysqli_query($conn,$query);
		$i=0;
        while($row=mysqli_fetch_array($rs,MYSQLI_ASSOC))
        {
		 $img[$i]=$row['anh'];
		 $ten[$i]=$row['tensp'];
		 $gia[$i]=$row['dongia'];
		 $id[$i]=$row['id'];
		 $i++;
        }
		$dem=$i*220;
		$dem1=$i*220;
		$dem2=$i*100;
		$tong_tien=0;
		if($i==0)
		{
	      echo"<p id='trong'>Giỏ hàng trống!</p>";
		}
		else
		{
		for($j=0;$j<$i;$j++)
		{
		  $tong_tien+=(int)$gia[$j];
		 echo "
             <div class='item'>
               <div class='left'>
	             <div class='img'>
	               <img src='".$img[$j]."'/>
	             </div>
	             <div class='content'>
	             ".$ten[$j]."
	             </div>
	           </div>
	           <div class='mid'>
			    Giá: ".number_format($gia[$j])." đ
	           </div>
	           
			   
			     <input class='bt' type='submit' value='Xoá' onclick='bt".$j."()'/> 
            </div>
			<script>
              document.getElementById('main').style.height='".$dem."';
			  document.getElementById('giohang').style.height='".$dem1."';
			  document.getElementById('item').style.height='".$dem2."';
			  function bt".$j."()
			  {
				location.href='delete.php?vl=".$id[$j]."';
			  }
		    </script>
			";
		}
		}
?>
  </div>
</div>
<?php
echo"
<div id='tong_tien'>Tổng tiền: ".number_format($tong_tien)." đ   <input class='btm' type='submit' value='Thanh Toán' onclick='btm()'/> 
</div>
<script>
            
			  function btm()
			  {
				location.href='buy.php?vl=".$sdt."';
			  }
		    </script>
";
?>
<?php
  include('../Footer/footer.php');
?>
</body>
</html>