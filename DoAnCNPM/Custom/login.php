<?php
session_start();
require("../Database/KetNoi.php");
?>
<html>
<head>
<meta charset="UTF-8"/>
<link rel="stylesheet" href="login.css">
</head>
<body>
  <div id="container">
    <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/1/12/User_icon_2.svg/440px-User_icon_2.svg.png"/>
	<form method="POST" action="" id="click">
	  <div>
	    <input id="form_user" type="text" name="user" placeholder="Nhập tên tài khoản"/>
	  </div>
	  <div>
	    <input id="form_user" type="password" name="pass" placeholder="Nhập mật khẩu"/>
	  </div>
	    <input id="form_submit" type="submit" name="submit" value="Đăng nhập"/>
	  </div>
	</form>
<?php
  if(isset($_POST['submit']))
  {
  $uname=$_POST['user'];
  $pword=$_POST['pass'];
  $query="SELECT user FROM login WHERE user='".$uname."' AND pass='".$pword."';";
  $rs= mysqli_query($conn,$query); 
  $query1="SELECT pass FROM login WHERE user='".$uname."' AND pass='".$pword."';";
  $rs1= mysqli_query($conn,$query1);
  if(mysqli_num_rows($rs)==0 && mysqli_num_rows($rs1)==0)
  {
    echo"<script>alert('Tài khoản hoặc mật khẩu không đúng!');</script>";
  }
  else
  {
  $query2="SELECT login.sdt FROM login WHERE login.user='".$uname."';";
  $rs2= mysqli_query($conn,$query2); 
  $sdt=array();
  if(mysqli_num_rows($rs2)>0)
  {
    $i=0;
	while($row=mysqli_fetch_assoc($rs2))
	{
	  $sdt[$i]= $row['sdt'];
	  $i++;
    }
  }
  $_SESSION['dt']=$sdt[0];
  $_SESSION['password']=$pword;
  if($uname=='admin' && $pword=='admin')
  {
	  echo
   "<script>
      alert('Đăng nhập thành công!');
	  var src='../Admin/xuatsp.php';
	  window.location.href=src;		
   </script>" ;
  }
  else
  {
  $query3="select *  from login where user='".$uname."' and pass='".$pword."' limit 1 ";
  $rs3= mysqli_query($conn,$query3);
  if(mysqli_num_rows($rs3)==1)
  {
   $_SESSION['username'] = $uname;
   echo
   "<script>
      alert('Đăng nhập thành công!');
	  var src='../vidu.php';
	  window.location.href=src;		
   </script>" ;
  }
  }
  }
  }
?>
  </div>
</body>
</html>