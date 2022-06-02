<?php
session_start();
require("../Database/KetNoi.php");
?>
<html>
<head>
<meta charset="UTF-8"/>
<link rel="stylesheet" href="res.css">
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
	  <div>
	    <input id="form_user" type="password" name="pass_again" placeholder="Nhập lại mật khẩu" value=""/>
	  </div>
	  <div>
	    <input id="form_user" type="text" name="na" placeholder="Nhập họ và tên"/>
	  </div>
	  <div>
	    <input id="form_user" type="text" name="addr" placeholder="Nhập địa chỉ"/>
	  </div>
	  <div>
	    <input id="form_user" type="text" name="sdt" placeholder="Nhập số điện thoại"/>
	  </div>
	  <div>
	    <input id="form_submit" type="submit" name="submit" onclick="my()" value="Đăng kí"/>
	  </div>
	</form>
<?php
  $conn= new mysqli($dbServername,$dbUsername, $dbPassword,$dbName);
  if(isset($_POST['submit']) && $_POST['user']!="" && $_POST['pass']!="")
  {
  $uname=$_POST['user'];
  $pword=$_POST['pass'];
  $query="SELECT user FROM login WHERE user='".$uname."';";
  $rs= mysqli_query($conn,$query); 
  if($_POST['pass']!=$_POST['pass_again'])
  {
	echo"<script>
	       alert('Mật khẩu không trùng khớp!');
		   var src='".$_POST['user']."';
           document.getElementById('form_user').value=src;
           var src1='".$_POST['pass']."';
           document.getElementById('form_password').value=src1;	
           var src2='".$_POST['pass_again']."';
           document.getElementById('form_password_again').value=src2;		
           var src3='".$_POST['sdt']."';
           document.getElementById('sdt').value=src3;				   
		</script>";
  }
  else 
  {
    if(mysqli_num_rows($rs)>0)
   {
    echo"<script>
	       alert('Tài khoản đã có người đăng kí!');
		   var src='".$_POST['user']."';
           document.getElementById('form_user').value=src;
           var src1='".$_POST['pass']."';
           document.getElementById('form_password').value=src1;	
           var src2='".$_POST['pass_again']."';
           document.getElementById('form_password_again').value=src2;		
           var src3='".$_POST['sdt']."';
           document.getElementById('sdt').value=src3;				   
		</script>";
   }
   else
   {
   $phone=$_POST['sdt'];
   $_SESSION['dt']=$phone;
   $_SESSION['password']=$pword;
   $name=$_POST['na'];
   $addr=$_POST['addr'];
   $query2="INSERT INTO login (id, user, pass,name,addr,sdt) VALUES (NULL, '".$uname."', '".$pword."','".$name."','".$addr."','".$phone."')";
   $rs2= mysqli_query($conn,$query2);
   $_SESSION['username']=$uname;
   echo
    "<script>
       alert('Đăng kí thành công!');
	   var src='../vidu.php';
	   window.location.href=src;		
    </script>" ;
   }
  }
  }
?>
  </div>
</body>
</html>