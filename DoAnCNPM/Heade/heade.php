<div id="header">
    <div id="container">
	  <div id="logo">
	    <a href="vidu.php">
	      <img src ="logo.png" />
		</a>  
	  </div>
	  <div id="seach">
		<form method="POST" action="">
		  <input id="tx" type="text" name="nhap" value=""/>
		  <input id="sm" type="submit" value="Tìm kiếm" name="seach" />
		</form>	
<?php
		if(isset($_POST['seach']) && $_POST['nhap']!="")
	    {
		$vl = $_POST['nhap'];
		header("location:seach.php?value=".$vl."");
		}
?>
	  </div>
<?php	  
	  if(isset($_SESSION['username']))
	   { 
?>  
	      <div id='login'>
	        <a href='Custom/rename.php'>
		     <img src='https://upload.wikimedia.org/wikipedia/commons/thumb/1/12/User_icon_2.svg/440px-User_icon_2.svg.png'/>
		     <p id='check'><?php echo $_SESSION['username']?></p>
		    </a>
		    <p id='mid'>/</p>
		    <a href='Custom/logout.php'><p id='p1'>Đăng xuất</p></a>
	      </div>
<?php
       }
      else
	   {
?>   
	      <div id='login'>
	        <a href='Custom/login.php'>
		      <img src='https://upload.wikimedia.org/wikipedia/commons/thumb/1/12/User_icon_2.svg/440px-User_icon_2.svg.png'/>
		      <p id='check'>Đăng nhập</p>
		    </a>
		    <p id='mid'>/</p>
		    <a href='Custom/res.php'><p id='p1'>Đăng kí</p></a>
	      </div>  
<?php
	   }
?>	   
	</div>
	<div id="menu">
	  <ul>
	    <li>
		  <a href="dongho.php">Đồng hồ Nam</a> 
		</li>
	    <li>
		  <a href="dongho1.php">Đồng hồ Nữ</a> 
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