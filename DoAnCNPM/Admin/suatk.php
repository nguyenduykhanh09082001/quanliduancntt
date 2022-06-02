<?php
session_start();
?>
<html>
<head>
<title>Sửa Thông Tin Tài Khoản</title>
<style>
body{
}
.container{
	width:500px;
	height:550px;
	margin:0 auto;
}
form{
	margin:0;
	padding:0;
}
form .container{
	margin-top:50px;
	background:url(../image/b1.jpg) no-repeat;
}
form .container h2{
	text-align:center;
	padding-top:20px;
}
form .container .txt{
	padding-left:50px;
}
form .container .txt label{
	font-size:18px;
}
form .container .txt input{
	width:300px;
	height:30px;
}
form .container .but{
	padding-left:50px;
}
form .container .but input{
	width:200px;
	height:30px;
	background:#FFFF00;
	color:#DC143C;
}
</style>
</head>
<body>
<form action=""method="POST">
<div class="container">
<div class="txt">
<h2>Sửa thông tin tài khoản</h2>
<?php
$dbServername="localhost";
$dbUsername="root";
$dbPassword="";
$dbName="bandongho";
$conn=new mysqli($dbServername,$dbUsername,$dbPassword,$dbName);
$ht=$_SESSION['uname'];
$dc=$_SESSION['dc'];
$dt=$_SESSION['dt'];
$ten=$_SESSION['ten'];
$mk=$_SESSION['mk'];
$id=$_SESSION['makh'];
echo"
<label>Số điện thoại:</label>
</br>
<input type='text' name='sdt' value='$dt'/>
</br>
</br>
<label>họ tên:</label>
</br>
<input type='text' name='hoten'value='$ten'/>
</br>
</br>
<label>địa chỉ:</label>
</br>
<input type='text' name='dc'value='$dc'/>
</br>
</br>
<label>Tài Khoản:</label>
</br>
<input type='text' name='us'value='$ht'/>
</br>
</br>
<label>Mật Khẩu Cũ</label>
</br>
<input type='password' name='matkhau'/>
</br>
</br>
<label>Nhập Mật Khẩu Mới:</label>
</br>
<input type='password' name='matkhau2'/>
</div>
</br>
</br>
<div class='but'>
<input type='submit' name='submit'value='Sửa thông tin'/>
<input type='submit' name='out'value='thoát'/>
</div>
</div>
</form>
</body>";
if(isset ($_POST['submit']) && $_POST['us']!="" && $_POST['matkhau']!=""&&$_POST['matkhau2']!=""&&$_POST['sdt']!=""&&$_POST['dc']!="")
{
if($_POST['matkhau']!=$mk)
{
echo"<script>alert('mật khẩu không chính xác'); </script>";
}
else{	
	$uname=$_POST['us'];
	$pword=$_POST['matkhau2'];
	$query="SELECT username FROM login WHERE username='".$uname."';";
	$rs=mysqli_query($conn,$query);
	if(mysqli_num_rows($rs)>0)
	{
		echo"<script>alert('Tên tài khoản đã có người đăng ký'); </script>";
	}
	else
	{
		$phone=$_POST['sdt'];
		$_SESSION['dt']=$phone;
		$ten=$_POST['hoten'];
		//$_SESSION['h']=$ten;
		$que=$_POST['dc'];
		//$_SESSION['d']=$que;
		$query2="UPDATE login SET diachi='".$que."',hoten='".$ten."',username='".$uname."',password='".$pword."'WHERE id='".$id."' ";
		$rs1=mysqli_query($conn,$query2);
		$_SESSION['username']=$uname;
		echo
		"<script>
		alert('đăng ký thành công');
		var src='login.php';
		window.location.href=src;
		</script>";
	}
}
}
if(isset ($_POST['out']))
{
	echo
		"<script>
		var src='trangchu.php';
		window.location.href=src;
		</script>";
}
?>
</html>
